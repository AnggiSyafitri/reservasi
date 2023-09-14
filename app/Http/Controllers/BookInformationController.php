<?php

namespace App\Http\Controllers;

use App\Models\BookInformation;
use App\Models\BookMenu;
use App\Models\Menu;
use App\Models\SittingArea;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.list', [
            'data' => BookInformation::with(['sittingArea'])->orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'guest_amount' => 'required|numeric',
            'sitting_area' => 'required',
            'reservation_date' => 'required',
            'reservation_time' => 'required',
            'allergy_note' => '',
            'request_note' => '',
            'proof' => 'required|mimes:jpg,jpeg,png'
        ]);

        // save proof
        $data = $request->except(['_token', 'menus']);
        $imageName = time().'_'.$request->file('proof')->getClientOriginalName();
        $request->file('proof')->storeAs('proofs', $imageName, 'public_upload');
        $data['proof'] = $imageName;

        // handle reservation time
        $data['reservation_time'] = Carbon::createFromFormat('Y-m-d H:i', $data['reservation_date'].' '.$data['reservation_time']);

        // create reservation
        $reservation = BookInformation::create($data);

        // create reservation menus
        $menus = $request->menus;
        if ($menus && $request->type == 'order_now') {
            foreach ($menus as $key => $data) {
                $id = explode('|',$data)[0];
                $amount = explode('|',$data)[1];
                $menu = Menu::find($id);
                BookMenu::create([
                    'menu_id' => $id,
                    'book_information_id' => $reservation->id,
                    'amount' => $amount,
                    'total_price' => $menu->price * $amount
                ]);
            }
        }
        return redirect()->route('reservation.done');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookInformation $book)
    {
        $bookInformation = $book;
        return view('books.detail', [
            'data' => $book->with('menus.detail')->where('id', $book->id)->first(),
            'sitting_areas' => SittingArea::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookInformation $bookInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookInformation $bookInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookInformation $book )
    {
        $bookInformation = $book;
        if (!$bookInformation) {
            return redirect()->back()->with('error', 'Data not found');
         }
         File::delete(public_path("/uploads/proofs/".$bookInformation->proof));

        //  dd($bookInformation);
         $bookInformation->delete();

         return redirect()->route('books.index')->with('success', 'Reservation successfully deleted');
    }

    private function validateTime($date) {
        $open_at = Carbon::create($date->year, $date->month, $date->day, 8, 0, 0);
        $closed_at = Carbon::create($date->year, $date->month, $date->day, 20, 0, 0);
        return $date->between($closed_at, $open_at, true);
    }

    private function validateRoom($books) {
        $sitting_areas = SittingArea::all();
        foreach ($books as $key => $book) {
            $sitting_area = $sitting_areas->find($book->sitting_area);
            if ($sitting_area->name == 'VVIP' || $sitting_area->name == 'VIP') {
                return false;
            }
        }
        return true;
    }

    private function validateCapacity($sitting_area, $guest_amount) {
        return $sitting_area->capacity >= $guest_amount;
    }

    public function checkAvailability(Request $request) {
        try {
            $timezone = 'Asia/Jakarta';
            $duration = 3;
            $reservation_date = Carbon::parse($request->reservation_date);
            $reservation_time = Carbon::createFromFormat('Y-m-d H:i', $request['reservation_date'].' '.$request['reservation_time'], $timezone);
            $reservation_time_offset = Carbon::createFromFormat('Y-m-d H:i', $request['reservation_date'].' '.$request['reservation_time'], $timezone)->addHours($duration);

            $sitting_area = SittingArea::all()->where('id', $request->sitting_area)->first();

            if (!$this->validateCapacity($sitting_area, $request->guest_amount)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Pastikan guest amount yang anda inputkan tidak melebihi kapasitas',
                ]);
            }

            if (!$this->validateTime($reservation_time)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Pastikan reservasi di antara jam 08:00 - 20:00',
                ]);
            }


            $books = BookInformation::all()
                ->whereNotIn('status', 'rejected')
                ->where('sitting_area', $request->sitting_area)
                ->where('reservation_date', $reservation_date)
                ->filter(function ($book) use ($reservation_time, $reservation_time_offset, $duration){
                    $x = Carbon::parse($book->reservation_time)->addHours($duration);
                    return $x->between($reservation_time, $reservation_time_offset);
                    // && $x->gte($reservation_time_offset)
                });
            // dd(Carbon::parse($books->first()->reservation_time).'-'.$reservation_time);
            // ->whereBetween('reservation_time', [$reservation_time, $reservation_time_offset]);
            // dd(Carbon::parse($books->first()->reservation_time)->between($reservation_time, $reservation_time_offset));
            // dd($reservation_time.'|'.$reservation_time_offset);
            if ($books->count() == 0) {
                return response()->json([
                    'status' => true,
                    'message' => 'Kursi Tersedia',
                ]);
            }

            if (!$this->validateRoom($books)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Ruang sudah penuh',
                ]);
            }

            $capacity_used = 0;
            $sitting_area = SittingArea::find($request->sitting_area);
            foreach ($books as $key => $book) {
                $capacity_used += (int)$book->guest_amount;
            }
            $capacity_available = (int)$sitting_area->capacity - (int)$capacity_used;
            if ($capacity_used < (int)$sitting_area->capacity && $capacity_available >= $request->guest_amount) {
                return response()->json([
                    'status' => true,
                    'message' => 'Kursi Tersedia'
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Kursi Tidak tersedia, '.$sitting_area->name.' tersisa '.(int)$sitting_area->capacity - $capacity_used. ' kursi'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Mohon dicermati kembali'
            ]);
        }
    }


    function verify($id) {
        $bookInformation = BookInformation::find($id);
        $bookInformation->update([
            'status' => 'verified'
        ]);
        return redirect()->route('books.index')->with('success', 'Success verify reservation');
    }

    function reject($id) {
        $bookInformation = BookInformation::find($id);
        $bookInformation->update([
            'status' => 'rejected'
        ]);
        return redirect()->route('books.index')->with('success', 'Success reject reservation');
    }

}

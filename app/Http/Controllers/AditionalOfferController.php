<?php

namespace App\Http\Controllers;

use App\Models\AditionalOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AditionalOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aditionals.list', [
            'data' => AditionalOffer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aditionals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'detail' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $data = $request->except(['_token']);
        $data['slug'] = str_replace(' ', '-', $data['title']);
        $imageName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('aditionalOffers', $imageName, 'public_upload');
        $data['image'] = $imageName;

        // dd($data);

        AditionalOffer::create($data);
        return redirect()->back()->with('success', 'Success created aditional offer');
    }

    /**
     * Display the specified resource.
     */
    public function show(AditionalOffer $aditionalOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AditionalOffer $aditionalOffer)
    {
        return view('aditionals.edit', [
            'data' => $aditionalOffer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AditionalOffer $aditionalOffer)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'detail' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ]);

        $data = $request->except(['_token']);

        if ($request->file('image')) {
            File::delete(public_path("/uploads/aditionalOffers/".$aditionalOffer->image));
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('aditionalOffers', $fileName, 'public_upload');
            $data['image'] = $fileName;
        }
        $aditionalOffer->update($data);
        return redirect()->back()->with('success', 'Success updated aditional offers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AditionalOffer $aditionalOffer)
    {
        if (!$aditionalOffer) {
            return redirect()->back()->with('error', 'Data not found');
         }
         File::delete(public_path("/uploads/aditionalOffers/".$aditionalOffer->image));
         $aditionalOffer->delete();
         return redirect()->route('aditionalOffers.index')->with('success', 'Data successfully deleted');
    }
}

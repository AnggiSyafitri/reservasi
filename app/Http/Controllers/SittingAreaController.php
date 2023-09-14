<?php

namespace App\Http\Controllers;

use App\Models\SittingArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SittingAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sittingAreas.list', [
            'data' => SittingArea::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sittingAreas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'capacity' => 'required|numeric',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        $fileName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('sittingAreas', $fileName, 'public_upload');
        $data = $request->except(['_token']);
        $data['image'] = $fileName;

        SittingArea::create($data);
        return redirect()->back()->with('success', 'Success created sitting area');

    }

    /**
     * Display the specified resource.
     */
    public function show(SittingArea $sittingArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SittingArea $sittingArea)
    {
        return view('sittingAreas.edit', [
            'data' => $sittingArea
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SittingArea $sittingArea)
    {
        $request->validate([
            'name' => 'required|min:3',
            'capacity' => 'required|numeric',
            'image' => 'mimes:jpg,png,jpeg'
        ]);

        $data = $request->except(['_token']);
        unset($data['image']);
        if ($request->file()) {
            File::delete(public_path("/uploads/sittingAreas/".$sittingArea->image));
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('sittingAreas', $fileName, 'public_upload');
            $data['image'] = $fileName;
        }

        $sittingArea->update($data);
        return redirect()->back()->with('success', 'Success updated sitting area');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SittingArea $sittingArea)
    {
        if (!$sittingArea) {
            return redirect()->back()->with('error', 'Data not found');
         }
         File::delete(public_path("/uploads/sittingAreas/".$sittingArea->image));
         $sittingArea->delete();
         return redirect()->route('sittingAreas.index')->with('success', 'Menu successfully deleted');
    }
}

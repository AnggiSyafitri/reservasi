<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('informations.list', [
            'data' => Information::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('informations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|file|mimes:pdf',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);
        $data = $request->except(['_token']);
        // handle pdf's file
        $fileName = time().'_'.$request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('informations', $fileName, 'public_upload');
        $data['file'] = $fileName;

        // handle image's file
        $imageName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('informations', $imageName, 'public_upload');
        $data['image'] = $imageName;

        Information::create($data);
        return redirect()->back()->with('success', 'Success created new information');
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        return view('informations.edit', [
            'data' => $information
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'file|mimes:pdf',
            'image' => 'mimes:jpg,jpeg,png'
        ]);

        $data = $request->except(['_token']);
        unset($data['file']);
        unset($data['images']);

        if ($request->file('file')) {
            File::delete(public_path("/uploads/informations/".$information->file));
            $fileName = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('informations', $fileName, 'public_upload');
            $data['file'] = $fileName;
        }

        if ($request->file('image')) {
            File::delete(public_path("/uploads/informations/".$information->image));
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('informations', $fileName, 'public_upload');
            $data['image'] = $fileName;
        }

        $information->update($data);
        return redirect()->back()->with('success', 'Success updated information');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        if (!$information) {
            return redirect()->back()->with('error', 'Data not found');
         }
         File::delete(public_path("/uploads/informations/".$information->image), public_path("/uploads/informations/".$information->file));
         $information->delete();
         return redirect()->route('informations.index')->with('success', 'Data successfully deleted');
    }
}

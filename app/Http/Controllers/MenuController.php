<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menus.list', [
            'data' => Menu::all()->reverse()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'type' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'price' => 'required|numeric'
        ]);

        $fileName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('menus', $fileName, 'public_upload');
        $data = $request->except(['_token']);
        $data['image'] = $fileName;
        Menu::create($data);
        return redirect()->back()->with('success', 'Success created new menu');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', [
            'data' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'type' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'price' => 'numeric'
        ]);

        $data = $request->except(['_token']);
        unset($data['image']);
        if ($request->file()) {
            File::delete(public_path("/uploads/menus/".$menu->image));
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('menus', $fileName, 'public_upload');
            $data['image'] = $fileName;
        }
        $menu->update($data);
        return redirect()->back()->with('success', 'Success updated menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if (!$menu) {
           return redirect()->back()->with('error', 'Data not found');
        }
        File::delete(public_path("/uploads/menus/".$menu->image));
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu successfully deleted');
    }
}

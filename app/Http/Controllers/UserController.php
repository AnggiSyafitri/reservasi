<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.list', [
            'data' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username|alpha_dash',
            'name' => 'required|min:3',
            'password' => 'required|min:5'
        ]);
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->back()->with('success', 'Success created new user');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('users.edit',[
            'data' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'username' => 'required|unique:users,username,'.$id.'|alpha_dash',
            'name' => 'required|min:3',
            'role' => 'required',
        ]);

        if($request->password){
            $validate['password'] = Hash::make($request->password);
        }
        User::where('id',$id)->update($validate);

        return redirect()->back()->with('success', 'Success edited user');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
           return redirect()->back()->with('error', 'User not found');
        }

        User::where('id',$id)->delete();

       return redirect()->route('users.index')->with('success', 'User successfully deleted');
    }
}

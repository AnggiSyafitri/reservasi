<?php

namespace App\Http\Controllers;

use App\Models\BookInformation;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    function view(){
        return view('admin.index', [
            'total_menus' => Menu::all()->count(),
            'total_booked' => BookInformation::all()->count(),
            'total_users' => User::all()->count()
        ]);
    }

    function profileView() {
        return view('admin.profile');
    }

    function editProfile(Request $request){
        $validate = $request->validate([
            'name' => ['required','max:255'],
            'username' => ['required'],
        ]);

        User::where('id',Auth::user()->id)->update($validate);

        return redirect()->back()->with('success', 'Success edited profile');

    }


    public function updatePassword(Request $request){
        if (Hash::check($request->current_password, Auth::user()->password)) {
            $validate['password'] = Hash::make($request->new_password);
            User::where('id',Auth::user()->id)->update($validate);
            return redirect()->back()->with('success2', 'Success edited password');
        }else{
            return redirect()->back()->with('error', "Password doesn't match ");
        }

    }

}

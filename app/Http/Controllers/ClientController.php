<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\AditionalOffer;
use App\Models\Menu;
use App\Models\Question;
use App\Models\SittingArea;

class ClientController extends Controller
{
    public function index(){
        return view('client.index',[
            'information' => Information::all(),
            'aditionals' => AditionalOffer::all(),
        ]);
    }

    public function ReservationView(){
        return view('client.reservation',[
            'menu' => menu::all(),
            'sitting_areas' => SittingArea::all()
        ]);
    }

    public function OffersDetail($slug){
        return view('client.OffersDetail',[
            'data' => AditionalOffer::firstWhere('slug',$slug),
            'aditionals' => AditionalOffer::where('slug', '!=', $slug)->orderBy('created_at', 'desc')->take(3)->get(),
        ]);
    }

    public function QuestionView(){
        return view('client.question', [
            'questions' => Question::all()
        ]);
    }
}

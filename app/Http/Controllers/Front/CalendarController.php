<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reservation;

class CalendarController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('created_at','DESC')->get();
        $reservation1 = Reservation::where('villa_number',1)->where('status',1)->get();
        $reservation1last = Reservation::where('villa_number',1)->where('status',1)->orderBy('id','DESC')->first();
        $reservation2 = Reservation::where('villa_number',2)->where('status',1)->get();
        $reservation2last = Reservation::where('villa_number',2)->where('status',1)->orderBy('id','DESC')->first();
        $reservation3 = Reservation::where('villa_number',3)->where('status',1)->get();
        $reservation3last = Reservation::where('villa_number',3)->where('status',1)->orderBy('id','DESC')->first();
        $reservation4 = Reservation::where('villa_number',4)->where('status',1)->get();
        $reservation4last = Reservation::where('villa_number',4)->where('status',1)->orderBy('id','DESC')->first();
        $reservation5 = Reservation::where('villa_number',5)->where('status',1)->get();
        $reservation5last = Reservation::where('villa_number',5)->where('status',1)->orderBy('id','DESC')->first();
        $reservation6 = Reservation::where('villa_number',6)->where('status',1)->get();
        $reservation6last = Reservation::where('villa_number',6)->where('status',1)->orderBy('id','DESC')->first();
        return view('front.calendar', compact('reservations',
            'reservation1','reservation1last'
            ,'reservation2','reservation2last'
            ,'reservation3','reservation3last'
            ,'reservation4','reservation4last'
            ,'reservation5','reservation5last'
            ,'reservation6','reservation6last'));
    }
}

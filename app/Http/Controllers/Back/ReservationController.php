<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('created_at','ASC')->get();

        return view('back.reservations.index', compact('reservations'));
    }
    public function SwitchStatus(Request $request){
        $reservations=Reservation::findOrFail($request->id);
        $reservations->status = $request->statu =='true' ? 1 : 0;
        $reservations->save();
    }
    public function delete(Request $request){
        $reservations=Reservation::findOrFail($request->id);
        $reservations->delete();
        toastr()->info('Rezervasyon Başarılı Şekilde Silindi!');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Models\EstateCategory;
use Illuminate\Http\Request;

use App\Models\Reservation;

class RoomCalendarController extends Controller
{
    public function getCalendar($category, $slug){

        $gcategory = EstateCategory::where('slug',$category)->first() ?? abort(403,'Böyle bir kategori bulunamadı!');

        $estates = Estate::where('slug',$slug)->where('estatecategory_id',$gcategory->id)->first() ?? abort(403,'Böyle bir yazı bulunamadı!');
        $data['estates'] = $estates;

        $data['calendars']=Reservation::orderBy('created_at','ASC')->get();

        return view('front.singleroom',$data,compact('estates'));
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Estate;
use App\Models\EstateCategory;
use App\Models\Reservation;
use App\Models\EstateFeature;

class RoomController extends Controller
{
    public function index(){
        $data['estates'] = Estate::with('getEstateCategory')->where('status',1)->whereHas('getEstateCategory',function($query){
            $query->where('status',1);
        })->orderBy('created_at','DESC')->paginate(30);
        //$estates=Estate::orderBy('created_at','DESC')->get();
        $data['estatefeature']=EstateFeature::orderBy('created_at','ASC')->get();
        return view('front.rooms',$data);
    }
    public function roomsinglepage($category, $slug)
    {
        $gcategory = EstateCategory::where('slug',$category)->first() ?? abort(403,'Böyle bir kategori bulunamadı!');

        $estates = Estate::where('slug',$slug)->where('estatecategory_id',$gcategory->id)->first() ?? abort(403,'Böyle bir yazı bulunamadı!');
        $data['estates'] = $estates;

        /*$articles2=Article::orderBy('created_at','DESC')->get();

        $articles->increment('hit');*/
        $estates2=Estate::orderBy('created_at','ASC')->get();
        $estatefeature=EstateFeature::orderBy('created_at','ASC')->get();
        $calendars = Reservation::where('villa_number', $estates->id)->where('status',1)->get();
        return view('front.singleroom',$data, compact('estates','estates2','estatefeature','calendars'));
    }
    public function ReservationPost(Request $request){

        /*Mail::send([],[], function ($message) use($request) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->sender('john@johndoe.com', 'John Doe');
            $message->to('john@johndoe.com', 'John Doe');
            $message->cc('john@johndoe.com', 'John Doe');
            $message->bcc('john@johndoe.com', 'John Doe');
            $message->replyTo('john@johndoe.com', 'John Doe');

            $message->setBody('

                Gönderen: '.$request->name.'<br>
                Mail: '.$request->email.'<br>
                Konu: '.$request->topic.'<br>
                Mesaj: '.$request->message.'<br>
                Tarih: '.now().'<br>
            ','text/html');

            $message->subject($request->name.' iletişiminden mesaj geldi');
        });*/

        $reservation = new Reservation();
        $reservation->villa_number=$request->villanumber;
        $reservation->villa_personcount=$request->personcount;
        $reservation->checkin=$request->checkin;
        $reservation->checkout=$request->checkout;
        $reservation->name=$request->name;
        $reservation->email=$request->email;
        $reservation->phone=$request->phone;
        $reservation->save();
        return redirect()->route('rooms')->with('success','Rezervasyonunuz başarıyla alınmıştır, kısa zamanda sizinle iletişime geçeceğiz.');
    }
}

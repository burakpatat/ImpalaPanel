<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact');
    }
    public function contactform(){
        $contacts = Contact::orderBy('created_at','ASC')->get();

        return view('back.contactform.contactform', compact('contacts'));
    }
    public function contactpost(Request $request){

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

        $contact = new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=0;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Mesajınız başarıyla iletilmiştir.');
    }
}

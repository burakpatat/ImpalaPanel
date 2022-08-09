<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }
    public function loginpost(Request $request)
    {
       if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){

        toastr()->success('Tekrardan Hoşgeldiniz!', Auth::user()->name);

        return redirect()->route('admin.dashboard');
       }
       else{
        return redirect()->route('admin.login')->withErrors("Email veya Şifre Hatalı!");
       }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function index(){
        
        $profiles = Admin::all();

        return view('back.userprofile',compact('profiles'));
    }

    public function create(Request $request){

        $request->validate([
            'profileimage' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $profile = new Admin;
        $profile->name=$request->profilename;
        $profile->username=$request->profileusername;
        $profile->password=Hash::make($request->profilepassword);
        $profile->mail=$request->profilemail;
        $profile->number=$request->profilenumber;
        if($request->hasFile('profileimage')){
            $imageName=Str::slug($request->profilename).'.'.$request->profileimage->getClientOriginalExtension();
            $request->profileimage->move(public_path('uploads'),$imageName);
            $profile->image = '/uploads/'.$imageName;
        }

        $profile->save();

        toastr()->success('Kullanıcı Başarılı Şekilde Oluşturuldu!');

        return redirect()->back();
    }

    public function updatedata(Request $request){
        $profiles=Admin::findOrFail($request->id);
        return response()->json($profiles);
    }

    public function update(Request $request){

        $profile = Admin::find($request->id);
        $profile->name=$request->pname;
        $profile->username=$request->pusername;
        $profile->mail=$request->pmail;
        $profile->number=$request->pnumber;
        if($request->hasFile('pimage')){
            $imageName=Str::slug($request->pname).'.'.$request->pimage->getClientOriginalExtension();
            $request->pimage->move(public_path('uploads'),$imageName);
            $profile->image = '/uploads/'.$imageName;
        }

        $profile->save();

        toastr()->success('Kullanıcı Başarılı Şekilde Güncellendi!');

        return redirect()->back();
    }
}

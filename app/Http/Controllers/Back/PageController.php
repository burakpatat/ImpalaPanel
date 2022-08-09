<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Page;

class PageController extends Controller
{
    public function index(){
        $pages=Page::all();

        return view('back.pages.index', compact('pages'));
    }

    public function create(){
        return view('back.pages.create');
    }

    public function createpost(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $last = Page::orderBy('order','DESC')->first();

        $page = new Page;
        $page->title = $request->title;
        $page->content = $request->content;
        $page->order=$last->order+1;
        $page->slug = Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $page->image = '/uploads/'.$imageName;
        }

        $page->save();

        toastr()->success('Başarılı', 'Sayfa Başarılı Şekilde Oluşturuldu!');

        return redirect()->route('admin.page.index');
    }

    public function update($id){

        $page=Page::findOrFail($id);

        return view('back.pages.update', compact('page'));
    }

    public function updatepost(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->slug = Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $page->image = '/uploads/'.$imageName;
        }

        $page->save();

        toastr()->info('Sayfa Başarılı Şekilde Güncellendi!');

        return redirect()->route('admin.page.index');
    }

    public function delete($id)
    {
        $page = Page::find($id);

        $image_path = public_path($page->image);

        if(unlink($image_path)){
            $page->delete();
            toastr()->warning('Sayfa Başarıyla Silindi!');
            return redirect()->route('admin.page.index'); 
        }
    }

    public function SwitchStatus(Request $request){
        $pages=Page::findOrFail($request->id);
        $pages->status = $request->statu =='true' ? 1 : 0;
        $pages->save();
    }

    public function Orders(Request $request){
        foreach($request->get('page') as $key => $order){
            Page::where('id',$order)->update(['order'=>$key]);
        }
    }
}

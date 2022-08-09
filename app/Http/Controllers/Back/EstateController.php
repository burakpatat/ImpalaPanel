<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Estate;
use App\Models\EstateCategory;
use App\Models\EstateInfo;
use App\Models\EstateFeature;
use App\Models\FeatureSpecial;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estates=Estate::orderBy('created_at','DESC')->get();

        return view('back.estates.index', compact('estates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estatecategories = EstateCategory::all();
        $estatefeatures = EstateFeature::all();
        return view('back.estates.create', ['estatecategories' => $estatecategories, 'estatefeatures' => $estatefeatures]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'image.*' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $estate = new Estate;
        $estateinfo = new EstateInfo;

        $estate->title = $request->estatetitle;
        $estate->estatecategory_id = $request->estatecategory;
        $estate->description = $request->estatedescription;
        $estate->slug = Str::slug($request->estatetitle);
        $estate->price = $request->estateprice;

        $i=0;
        if($request->hasFile('image')){
            foreach($request->file('image') as $file)
            {
                $i += 1;
                $imageName=Str::slug($request->estatetitle).$i.'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads'),$imageName);
                $imgData[] = '/uploads/'.$imageName;
            }
            $estate->image= implode('|',$imgData);
        }

        $estateinfo->room = $request->room;
        $estateinfo->person = $request->person;
        $estateinfo->bedroom = $request->bedroom;
        $estateinfo->bathroom = $request->bathroom;
        $estateinfo->heating = $request->heating;
        $estateinfo->pool = $request->pool;
        $estateinfo->carpark = $request->carpark;
        $estateinfo->area = $request->area;
        $estateinfo->estateage = $request->estateage;
        $estateinfo->floor = $request->floor;
        $estateinfo->swap = $request->swap;

        $estate->save();

        foreach($request->estatefeatures as $feature) {
            FeatureSpecial::create([
                'estatefeatures_id' => $feature,
                'estate_id' => $estate->id
            ]);
        }

        $estateinfo->save();

        toastr()->success('Başarılı', 'Makale Başarılı Şekilde Oluşturuldu!');

        return redirect()->route('estates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estate=Estate::findOrFail($id);
        $categories = EstateCategory::all();

        return view('back.estates.update', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image = '/uploads/'.$imageName;
        }

        $article->save();

        toastr()->info('Makale Başarılı Şekilde Güncellendi!');

        return redirect()->route('articles.index');
    }

    public function SwitchStatus(Request $request){
        $estate=Estate::findOrFail($request->id);
        $estate->status = $request->statu =='true' ? 1 : 0;
        $estate->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        Estate::find($id)->delete();
        toastr()->warning('İlan Geri Dönüştürüldü!');
        return redirect()->route('estates.index');
    }
    public function trashed()
    {
        $estates = Estate::onlyTrashed()->orderBy('deleted_at','DESC')->get();
        return view('back.estates.trashed', compact('estates'));
    }
    public function recover($id)
    {
        Estate::onlyTrashed()->find($id)->restore();
        toastr()->info('İlan Başarıyla Geri Dönüştürüldü!');
        return redirect()->route('estates.index');
    }
    public function hardDelete($id)
    {
        $estate = Estate::findOrFail($id);
        $estate->delete();
        toastr()->warning('İlan Başarıyla Silindi!');
        return redirect()->route('estates.index');
    }
}

<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Article;
use App\Models\Category;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy('created_at','DESC')->get();

        return view('back.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('back.articles.create', compact('categories'));
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
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $article = new Article;
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

        toastr()->success('Başarılı', 'Makale Başarılı Şekilde Oluşturuldu!');

        return redirect()->route('articles.index');
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
        $article=Article::findOrFail($id);
        $categories = Category::all();

        return view('back.articles.update', compact('categories','article'));
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
        $article=Article::findOrFail($request->id);
        $article->status = $request->statu =='true' ? 1 : 0;
        $article->save();
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
        Article::find($id)->delete();
        toastr()->warning('Makale Geri Dönüştürüldü!');
        return redirect()->route('articles.index');
    }
    public function trashed()
    {
        $articles = Article::onlyTrashed()->orderBy('deleted_at','DESC')->get();
        return view('back.articles.trashed', compact('articles'));
    }
    public function recover($id)
    {
        Article::onlyTrashed()->find($id)->restore();
        toastr()->info('Makale Başarıyla Geri Dönüştürüldü!');
        return redirect()->route('articles.index');
    }
    public function hardDelete($id)
    {
        $article = Article::onlyTrashed()->find($id);

        $image_path = public_path($article->image);

        if(unlink($image_path)){
            $article->forceDelete();
            toastr()->warning('Makale Başarıyla Silindi!');
            return redirect()->route('articles.index'); 
        }

        
    }
}

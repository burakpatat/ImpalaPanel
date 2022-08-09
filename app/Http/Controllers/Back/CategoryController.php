<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();

        return view('back.categories.index',compact('categories'));
    }

    public function create(Request $request){

        $isExist = Category::where('slug',Str::slug($request->categoryname))->first();
        if($isExist){
            toastr()->error($request->categoryname.' adında bir kategori zaten mevcut!!');
            return redirect()->back();
        }

        $category = new Category;
        $category->name=$request->categoryname;
        $category->slug=Str::slug($request->categoryname);
        $category->save();

        toastr()->success('Kategori Başarılı Şekilde Oluşturuldu!');

        return redirect()->back();
    }

    public function updatedata(Request $request){
        $category=Category::findOrFail($request->id);
        return response()->json($category);
    }

    public function update(Request $request){

        $isSlug = Category::where('slug', Str::slug($request->categoryslug))->whereNotIn('id', [$request->id])->first();
        $isName = Category::where('name', $request->categoryname)->whereNotIn('id', [$request->id])->first();
        if($isSlug || $isName){
            toastr()->error($request->categoryname.' adında bir kategori zaten mevcut!!');
            return redirect()->back();
        }

        $category = Category::find($request->id);
        $category->name=$request->cname;
        $category->slug=Str::slug($request->cslug);
        $category->save();

        toastr()->success('Kategori Başarılı Şekilde Güncellendi!');

        return redirect()->back();
    }

    public function delete(Request $request){
        $category=Category::findOrFail($request->id);

        if($category->articleCount()>0){
            Article::where('category_id',$category->id)->update(['category_id' => 1]);
        }
        $category->delete();
        toastr()->info('Kategori Başarılı Şekilde Silindi!');
        return redirect()->back();
    }

    public function SwitchStatus(Request $request){
        $category=Category::findOrFail($request->id);
        $category->status = $request->statu =='true' ? 1 : 0;
        $category->save();
    }
}

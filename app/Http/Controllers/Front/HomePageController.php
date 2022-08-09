<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\EstateFeature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Estate;
use App\Models\Article;
use App\Models\Category;
use App\Models\Config;

class HomePageController extends Controller
{
    public function index(){
        $estates=Estate::orderBy('created_at','DESC')->get();
        $articles=Article::orderBy('created_at','DESC')->get();
        $estatefeature=EstateFeature::orderBy('created_at','DESC')->get();

        return view('front.index', compact('estates', 'articles','estatefeature'));
    }
    public function blogsinglepage($category, $slug)
    {
        $gcategory = Category::where('slug',$category)->first() ?? abort(403,'Böyle bir kategori bulunamadı!');

        $articles = Article::where('slug',$slug)->where('category_id',$gcategory->id)->first() ?? abort(403,'Böyle bir yazı bulunamadı!');
        $data['articles'] = $articles;

        $articles2=Article::orderBy('created_at','DESC')->get();

        $articles->increment('hit');

        return view('front.singleblog',$data, compact('articles','articles2'));
    }
    public function calendar(){
        return view('front.calendar');
    }
}

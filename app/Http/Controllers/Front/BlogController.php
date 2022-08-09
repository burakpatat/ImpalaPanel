<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Article;

class BlogController extends Controller
{
    public function index(){
        $data['articles'] = Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('created_at','DESC')->paginate(10);
        return view('front.blog',$data);
    }
}

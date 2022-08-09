<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Article;
use App\Models\Estate;
use App\Models\Reservation;

class Dashboard extends Controller
{
    public function index()
    {
        $article=Article::all()->count();
        $hit=Article::sum('hit');
        $estate=Estate::all()->count();
        $reservation=Reservation::all()->count();
        return view('back.dashboard', compact('article','hit','estate','reservation'));
    }
}

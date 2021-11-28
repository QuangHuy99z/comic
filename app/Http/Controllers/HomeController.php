<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class HomeController extends Controller
{
    public function index()
    {   
        $sliders = Comic::limit(10)->get();
        $comics = Comic::latest()->paginate(5);
        $top_comics = Comic::limit(10)->get();
        return view('website.home.index', compact('sliders', 'comics', 'top_comics'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function genre(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            $keyword = $request->get('keyword');
            if($keyword != ''){
                $comics = Comic::where('name', 'LIKE', "%".$keyword."%")->where('title', 'LIKE', "%".$keyword."%")->paginate(2)->withQueryString();
                return view('website.search.index', compact('comics'));
            }
            $comics = Comic::latest()->paginate(5);
            return view('website.genre.index', compact('comics'));
        }
    }

    public function follow()
    {   
        $top_comics = Comic::limit(10)->get();
        return view('website.follow.index', compact('top_comics'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function search()
    {   

        return view('website.follow.index');
      
    }
}
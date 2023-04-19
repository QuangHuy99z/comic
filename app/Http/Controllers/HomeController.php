<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class HomeController extends Controller
{
    public function get_list_comics_in_home()
    {   
        $sliders = Comic::limit(10)->get();
        $comics = Comic::latest()->paginate(2);
       
        $top_comics = Comic::withCount('ranks')->orderBy('ranks_count', 'desc')->limit(10)->get();
        return view('website.home.index', compact('sliders', 'comics', 'top_comics'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function genre(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            $keyword = $request->get('keyword');
            if($keyword != ''){
                $comics = Comic::where('name', 'LIKE', "%".$keyword."%")->where('title', 'LIKE', "%".$keyword."%")->paginate(10)->withQueryString();
                
                return view('website.search.index', compact('comics'));
            }
            $comics = Comic::latest()->paginate(5);
            return view('website.genre.index', compact('comics'));
        }
    }
}
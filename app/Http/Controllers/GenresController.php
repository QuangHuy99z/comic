<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genres::latest()->paginate(5);
  
        return view('admin.genres.index',compact('genres'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.genres.create'); 
        }
        Genres::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.genres.index')->with('message', 'Add genres successfully');
    }
}

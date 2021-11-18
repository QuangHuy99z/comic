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

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $genre = Genres::findOrFail($id);
            return view('admin.genres.detail', compact('genre'));
        }
        $genre  = Genres::findOrFail($id);
        $genre->name = $request->name;
        $genre->description = $request->description;
        $genre->save();
        return redirect()->route('admin.genres.edit', $id)->with('message', 'Update genre successfully');
    }

    public function destroy($id)
    {
        $genre  = Genres::findOrFail($id);
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('message', 'Delete genre successfully');
    }
}

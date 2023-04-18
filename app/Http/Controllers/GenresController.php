<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Genres;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function get_list_genres()
    {
        $genres = Genres::latest()->paginate(10);
  
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
            'slug' => $this->uniqueSlug($request->name),
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
        $genre->slug = $this->uniqueSlug($request->name);
        $genre->save();
        return redirect()->route('admin.genres.edit', $id)->with('message', 'Update genre successfully');
    }

    public function show($slug="")
    {
        $genre = Genres::Where('slug', '=', $slug)->first();
        if ($genre){
            $comics = $genre->products()->paginate(5);
    
            return view('website.genre.detail', compact('genre', 'comics'));
        }
        return abort(404);
    }
    
    public function destroy($id)
    {
        $genre  = Genres::findOrFail($id);
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('message', 'Delete genre successfully');
    }

    public function uniqueSlug($title)
    {
        $slug = Str::slug($title, '-');
        $count = Genres::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}

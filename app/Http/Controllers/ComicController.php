<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\Genres;
use App\Models\Author;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::latest()->paginate(5);
  
        return view('admin.comics.index',compact('comics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('get')){
            $genres = Genres::all();
            return view('admin.comics.create', compact('genres'));
        }
        dd($request->all());
        $add_comic = [
            "title" => $request->title,
            "name" => $request->name,
            "image" => $request->image,
            "content" => strip_tags($request->content),
        ];
        $comic = Comic::create($add_comic);
        foreach ($request->authors as $author):
            $authors = Author::create([
                'name' => $author
            ]);
            $comic->authors()->attach($authors->id);
        endforeach;

        $comic->genres()->attach($request->genres);
        return redirect()->route('admin.comics.index')->with('message', 'Add comic successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('admin.comics.detail', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $comic = Comic::findOrFail($id);
            $genres = Genres::all();
            return view('admin.comics.detail', compact('comic', 'genres'));
        }
        $comic = Comic::findOrFail($id);
        $comic->genres()->sync($request->genres);
        return redirect()->route('admin.comics.edit', $id)->with('message', 'Update comic successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('admin.comics.index')->with('message', 'Delete comic successfully');
    }
}

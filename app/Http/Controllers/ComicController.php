<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Comic;
use App\Models\Genres;
use App\Models\Author;
use App\Models\Follow;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_list_comics()
    {
        $comics = Comic::latest()->paginate(10);
        return view('admin.comics.index', compact('comics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            $genres = Genres::all();
            $authors = Author::all();
            return view('admin.comics.create', compact('genres', 'authors'));
        }
        $add_comic = [
            "title" => $request->title,
            "name" => $request->name,
            "content" => strip_tags($request->content),
            "slug" => STR::slug($request->name),
        ];
        if ($request->fimage) {
            $file = $request->fimage;
            $pathName =  STR::random(5) . '-' . date('his') . '-' . STR::random(3) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/comics/', $pathName);
            $add_comic['image'] = $pathName; // check xem có ảnh ko rồi thêm vào biến add comic
        } else {
            $add_comic['image'] = "";
        }
        $comic = Comic::create($add_comic);
        $comic->authors()->attach($request->authors);
        $comic->genres()->attach($request->genres);
      
        return redirect()->route('admin.comics.index')->with('message', 'Add comic successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug = "")
    {
        $comic = Comic::where('slug', $slug)->first();
        if ($comic) {
            $check_follow = [];
            if (auth()->guard('web')->check()) {
                $follows = Follow::where('user_id', '=', auth()->guard('web')->user()->id)->get();
                foreach ($follows as $follow) :
                    if ($comic->id == $follow->comic_id && !in_array($follow->comic_id, $check_follow)) :
                        $check_follow[] = $follow->comic_id;
                    endif;
                endforeach;
            }
            $top_comics = Comic::withCount('ranks')->orderBy('ranks_count', 'desc')->limit(10)->get();
            return view('website.comic.index', compact('comic', 'top_comics', 'check_follow'));
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $comic = Comic::findOrFail($id);
            $genres = Genres::all();
            $authors = Author::all();
            $all_authors_of_current_comic = [];
            foreach ($authors as $author) :
                foreach ($comic->authors as $writer) :
                    if ($author->id == $writer->id && !in_array($writer->id, $all_authors_of_current_comic)) :
                        $all_authors_of_current_comic[] = $writer->id;
                    endif;
                endforeach;
            endforeach;
            $all_genres_of_current_comic = [];
            foreach ($genres as $genre) :
                foreach ($comic->genres as $type) :
                    if ($genre->id == $type->id && !in_array($type->id, $all_genres_of_current_comic)) :
                        $all_genres_of_current_comic[] = $type->id;
                    endif;
                endforeach;
            endforeach;
            // dd($all_genre_of_current_comic);
            $prev = Comic::Where('id', '>', $id)->orderBy('id', 'DESC')->limit(1)->get();
            $next = Comic::Where('id', '<', $id)->orderBy('id', 'DESC')->limit(1)->get();
            return view('admin.comics.detail', compact('comic', 'genres', 'authors', 'next', 'prev', 'all_authors_of_current_comic', 'all_genres_of_current_comic'));
        }
        $comic = Comic::findOrFail($id);
        $comic->update(
            [
                'name' => $request->name,
                'title' => $request->title,
                'content' => $request->content,
                'status' => $request->status,
            ]
        );
        if ($request->fimage) {
            $file = $request->fimage;
            $pathName =  STR::random(5) . '-' . date('his') . '-' . STR::random(3) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/comics/', $pathName);
            $comic->image = $pathName;
            $comic->save();
        }

        $comic->authors()->sync($request->authors);
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

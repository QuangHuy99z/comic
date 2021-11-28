<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Author;

class ChapterController extends Controller
{
    public function index()
    {
        $comics = Comic::latest()->paginate(5);

        return view('admin.chapters.index',compact('comics'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create(Request $request)
    {
        if ($request->isMethod('get')){
            $comics = Comic::all();
            return view('admin.chapters.create', compact('comics'));
        }
        $add_chapter = [
            "number" => $request->chapter_number,
            "comic_id" => $request->comic_name,
        ];
        $chapter = Chapter::create($add_chapter);
        if($request->chapter_image){
            foreach ($request->chapter_image as $fileItem):
                $fileNameItem = $fileItem->getClientOriginalName();
                $pathNameItem =  STR::random(5).'-'.date('his').'-'.STR::random(3).'.'.$fileItem->getClientOriginalExtension();
                $pathImg = $fileItem->move(public_path().'/uploads/comics/', $pathNameItem);  
                $chapter_image = $chapter->chapter_images()->create([
                    'image' => $pathNameItem
                ]);
            endforeach;
        }
        return redirect()->route('admin.chapters.index')->with('message', 'Add chapter for comic ' . $chapter->comic->name .'successfully');
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $comic = Comic::findOrFail($id);
            $prev = Comic::Where('id', '>', $id)->orderBy('id', 'DESC')->limit(1)->get();
            $next = Comic::Where('id', '<', $id)->orderBy('id', 'DESC')->limit(1)->get();

            return view('admin.chapters.detail', compact('comic', 'prev', 'next'));
        }
        $comic = Comic::findOrFail($id);
        return redirect()->route('admin.chapters.edit', $id)->with('message', 'Update chapter successfully');
    }

    public function show($slug="",$number="")
    {
        $comic = Comic::Where('slug', '=', $slug)->first();
        $chapter = Chapter::Where('comic_id', $comic->id)->Where('number', $number)->first();
        if ($chapter){
            $id = $chapter->id;
            $next = Chapter::Where('comic_id', '=', $chapter->comic->id)->Where('id', '>', $id)->orderBy('id', 'ASC')->limit(1)->get();
            $prev = Chapter::Where('comic_id', '=', $chapter->comic->id)->Where('id', '<', $id)->orderBy('id', 'DESC')->limit(1)->get();
            return view('website.chapter.index', compact('chapter', 'next', 'prev'));
        }
        return abort(404);
    }
}
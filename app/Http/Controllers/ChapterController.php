<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\Genres;
use App\Models\Author;
use App\Models\Chapter;
use App\Models\ChapterImage;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::all();
        
       
        $chapter = Chapter::latest()->paginate(5);
  
        return view('admin.chapters.index',compact('chapter'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')){
            $comics = Comic::all();
            $chapters = Chapter::all();
            return view('admin.chapters.create', compact('comics'), compact('chapters'));
        }
        $add_chapter = [
            "number" => $request->number,
            "comic_id" => $request->comics,
        ];
        $chapter = Chapter::create($add_chapter);

        foreach ($request->chapter_images as $chapterimage):
            $chapterimage = ChapterImage::create([
                'image' => $chapterimage,
                'chapter_id' => $chapter->id,
            ]);
        endforeach;
    }

    public function destroy($id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();
    }
}
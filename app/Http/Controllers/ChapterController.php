<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Author;
use App\Models\Rank;

class ChapterController extends Controller
{
    public function index()
    {
        $comics = Comic::latest()->paginate(10);
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
            foreach ($request->chapter_image as $fileItem) {
                $pathNameItem =  STR::random(5).'-'.date('his').'-'.STR::random(3).'.'. $fileItem->getClientOriginalExtension(); 
                $pathImg = $fileItem->move(public_path().'/uploads/comics/', $pathNameItem);  
                $chapter_image = $chapter->chapter_images()->create([ 
                    'image' => $pathNameItem 
                ]);
            }
        }
        return redirect()->route('admin.chapters.index')->with('message', 'Add chapter for comic ' . $chapter->comic->name .' successfully');
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

    public function show($slug="", $number="", $id="")
    {
        $comic = Comic::Where('slug', '=', $slug)->first();
    
        $chapter = Chapter::find($id);
        if ($chapter){ 
           
            if(auth()->guard('web')->check()) {
    
                $user_id = auth()->guard('web')->user()->id;
                $ranks = Rank::where([
                    ['comic_id', '=', $comic->id],
                    ['user_id', '=', $user_id],
                ])->get();
                if (count($ranks) == 0) {
                    Rank::create([
                        'comic_id' => $comic->id,
                        'user_id' => $user_id,
                    ]);
                }
            }
          
            $id = $chapter->id;
            $comic = Comic::find($comic->id);
            $chapter = Chapter::find($chapter->id);
            $history = session()->has('history') ? session()->get('history') : null;
            if(isset($history[$comic->id])){
                if (!in_array($chapter->id, $history[$comic->id]['chapter_ids'])) {
                    $history[$comic->id]['chapter_ids'][] = $chapter->id;
                    $history[$comic->id]['chapter_name'] = $chapter->number;
                    $history[$comic->id]['chapter_slug'] = route('chapter', [$comic->slug, $chapter->number, $chapter->id]);
                }
                $history[$comic->id]['created_at'] = date('Y-m-d H:i:s');
            } else {
                $history[$comic->id] = [
                    'comic_id' => $comic->id,
                    'comic_name' => $comic->name,
                    'comic_title' => $comic->title,
                    'chapter_ids' => [$chapter->id],
                    'chapter_name' => $chapter->number,
                    'image' => $comic->image,
                    'comic_slug' => route('comic', $comic->slug),
                    'chapter_slug' => route('chapter', [$comic->slug, $chapter->number, $chapter->id]),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
            uasort($history, function ($a, $b) {
                return strcmp($b['created_at'], $a['created_at']);
            });
            session()->put('history', $history);
            $next = Chapter::Where('comic_id', '=', $chapter->comic->id)->Where('id', '>', $id)->orderBy('id', 'ASC')->limit(1)->get();
            $prev = Chapter::Where('comic_id', '=', $chapter->comic->id)->Where('id', '<', $id)->orderBy('id', 'DESC')->limit(1)->get();
            return view('website.chapter.index', compact('chapter', 'next', 'prev'));
        }
        return abort(404);
    }
}
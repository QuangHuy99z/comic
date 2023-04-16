<?php

namespace App\Http\Controllers\WebsitePage\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\Chapter;

class HistoryController extends Controller
{
    public function index()
    {   
        // session()->flush();
        $histories = session()->get('history');
        // dd($histories);
        $arr = [];
        foreach ($histories as $index => $history) {
            
        }
        // krsort($histories['created_at']);
        // asort($history[]);

        dd($histories);
        $top_comics = Comic::limit(10)->get();
        return view('website.history.index', compact('top_comics'));
    }

    public function create_comic_history_by_session(Request $request)
    {   
        $comic_id = $request->comic_id;
        $chapter_id = $request->chapter_id;

        // dd($request->all());
        try {
            $comic = Comic::find($comic_id);
            $chapter = Chapter::find($chapter_id);
            $history = session()->has('history') ? session()->get('history') : null;
            if(isset($history[$comic_id])){
                if (!in_array($chapter->id, $history[$comic_id]['chapter_ids'])) {
                    $history[$comic_id]['chapter_ids'][] = $chapter->id;
                    $history[$comic_id]['chapter_name'] = $chapter->number;
                    $history[$comic_id]['chapter_slug'] = route('chapter', [$comic->slug, $chapter->number, $chapter->id]);
                }
                $history[$comic_id]['created_at'] = date('Y-m-d H:i:s');
            } else {
                $history[$comic_id] = [
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
            session()->put('history', $history);

            return response()->json([
                'comics' => [
                    'comic_id' => $comic->id,
                    'comic_name' => $comic->name,
                    'comic_title' => $comic->title,
                    'chapter_ids' => [$chapter->id],
                    'chapter_name' => $chapter->number,
                    'image' => $comic->image,
                    'slug' => route('chapter', [$comic->slug, $chapter->id]),
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                'message' => "Add comic to history successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => "Error to add comic to comic history read",
            ]);
        }
    }

    public function remove_comic_history_by_session(Request $request)
    {   
        $comic_id = $request->comic_id;
        $chapter_id = $request->chapter_id;

        // dd($request->all());
        try {
            $comic = Comic::find($comic_id);
            $chapter = Chapter::find($chapter_id);
            $history = session()->has('history') ? session()->get('history') : null;
            if(isset($history[$comic_id])){
                if (!in_array($chapter->id, $history[$comic_id]['chapter_ids'])) {
                    $history[$comic_id]['chapter_ids'][] = $chapter->id;
                    $history[$comic_id]['chapter_name'] = $chapter->number;
                    $history[$comic_id]['chapter_slug'] = route('chapter', [$comic->slug, $chapter->number, $chapter->id]);
                }
                $history[$comic_id]['created_at'] = date('Y-m-d H:i:s');
            } else {
                $history[$comic_id] = [
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
            session()->put('history', $history);

            return response()->json([
                'comics' => [
                    'comic_id' => $comic->id,
                    'comic_name' => $comic->name,
                    'comic_title' => $comic->title,
                    'chapter_ids' => [$chapter->id],
                    'chapter_name' => $chapter->number,
                    'image' => $comic->image,
                    'slug' => route('chapter', [$comic->slug, $chapter->id]),
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                'message' => "Add comic to history successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => "Error to add comic to comic history read",
            ]);
        }
    }
}

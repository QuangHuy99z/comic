<?php

namespace App\Http\Controllers\WebsitePage\Follow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comic;
use App\Models\Follow;


class FollowController extends Controller
{
    public function get_list_follow_comics()
    {
        $comics = Comic::withCount('ranks')->withCount('follows')->get();
        $all_follows_of_comic = [];
        if (Auth::guard('web')->check()) {
            $follows = Follow::where('user_id', '=', auth()->guard('web')->user()->id)->get();
            foreach ($follows as $follow) :
                if (!in_array($follow->comic_id, $all_follows_of_comic)) :
                    $all_follows_of_comic[] = $follow->comic_id;
                endif;
            endforeach;
        }
        $top_comics = Comic::withCount('ranks')->orderBy('ranks_count', 'desc')->limit(10)->get();
        return view('website.follow.index', compact('top_comics', 'comics', 'all_follows_of_comic'));
    }

    public function create_follow_comic(Request $request)
    {
        $comic = Comic::findOrFail($request->comic_id);
        if (Auth::guard('web')->check()) {
            $user_id = auth()->guard('web')->user()->id;
            $follows = Follow::where([
                ['comic_id', '=', $comic->id],
                ['user_id', '=', $user_id],
            ])->get();
            if (count($follows) == 0) {
                Follow::create([
                    'comic_id' => $comic->id,
                    'user_id' => $user_id,
                ]);
            }
        }
        return response()->json([
            'url' => route('comic', $comic->slug),
            'message' => "Add comic [ " . $comic->name . " ] from follow page successfully",
        ]);
    }

    public function delete_follow_comic(Request $request)
    {
        try {
            $comic = Comic::find($request->comic_id);
            $user_id = auth()->guard('web')->user()->id;
            Follow::where([
                ['user_id', '=', $user_id],
                ['comic_id', '=', $comic->id],
            ])->delete();

            return response()->json([
                'url' => route('comic', $comic->slug),
                'message' => "Delete comic [ " . $comic->name . " ] from follow page successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => "Error to delete comic to comic history read",
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\WebsitePage\Rank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rank;
use App\Models\Comic;


class RankController extends Controller
{
    public function index()
    {
        // session()->flush();

        // dd($histories);
        dd(Comic::withCount('ranks')->orderBy('ranks_count', 'desc')->get());
        // return view('website.history.index', compact('top_comics'));
    }
}

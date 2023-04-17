<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rank;
use App\Models\Comic;



class RankController extends Controller
{
    public function index()
    {
        dd(Comic::with('ranks')->find(1)->ranks()->count());
    }
}

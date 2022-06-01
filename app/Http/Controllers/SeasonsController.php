<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Series $series)
    {
        $seasons = $series->seasons()->with('episodes')->get();
        //dd($series->seasons->episodes->count());

        return view('seasons.index')->with('seasons', $seasons)->with('series', $series);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function showPoints()
    {
        $user = auth()->user()->id;
        $points = Point::where('user_id', $user)->get();
        return view('user.points')->with('points', $points);
    }
}

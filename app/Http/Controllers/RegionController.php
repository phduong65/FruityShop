<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegionController extends Controller
{
    public function index()
    {
        return view('regions.index');
    }

    public function fetchRegions()
    {
        
    }
}

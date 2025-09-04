<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SongApiController extends Controller{

    public function __construct()
    {
        $this->middleware('auth:sanctum'); // protect all API routes
    }
    public function getSongs()
    {
        return response()->json(Song::all(), 200);
    }
}
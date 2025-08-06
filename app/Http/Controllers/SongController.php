<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;



class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'lyrics' => 'required|string',
            'composer' => 'nullable|string|max:255',
            'arranger' => 'nullable|string|max:255',
        ]);

        // Create a new song instance
        $song = new Song();
        $song->title = $request->input('title');
        $song->lyrics = $request->input('lyrics');
        $song->composer = $request->input('composer');
        $song->arranger = $request->input('arranger');

        // Save the song to the database
        $song->save();

        return response()->json([
            'message' => 'Song created successfully!',
            'song' => $song,
        ], 201);

    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'title' => 'required|string|max:255',
        'lyrics' => 'required|string',
        'composer' => 'nullable|string|max:255',
        'arranger' => 'nullable|string|max:255',
    ]);

    // Create a new song
    $song = Song::create([
        'title' => $request->input('title'),
        'lyrics' => $request->input('lyrics'),
        'composer' => $request->input('composer'),
        'arranger' => $request->input('arranger'),
    ]);

    return response()->json([
        'message' => 'Song created successfully!',
        'song' => $song,
    ], 201);
}


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $song = Song::all();
        return response()->json($song);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }
}
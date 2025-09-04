<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;



class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function storeAPI(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'lyrics' => 'required|string',
            'composer' => 'nullable|string|max:255',
            'arranger' => 'nullable|string|max:255',
        ]);

        // Create a new song
        $song = Song::create($request->only(['title', 'lyrics', 'composer', 'arranger']));

        return response()->json([
            'message' => 'Song created successfully!',
            'song' => $song,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'lyrics' => 'required|string',
            'composer' => 'nullable|string|max:255',
            'arranger' => 'nullable|string|max:255',
        ]);

        Song::create($request->only(['title', 'lyrics', 'composer', 'arranger']));

        return redirect()->route('song_list')->with('success', 'Song uploaded successfully!');
    }

    public function showWeb()
    {
        $songs = Song::all();
        return view('dashboard/song_list', compact('songs'));
    }

    public function edit($id)
    {
        $song = Song::findOrFail($id);
        return view('dashboard/edit_song', compact('song'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'lyrics' => 'required|string',
            'composer' => 'nullable|string|max:255',
            'arranger' => 'nullable|string|max:255',
        ]);

        $song = Song::findOrFail($id);
        $song->update($request->only(['title', 'lyrics', 'composer', 'arranger']));

        return redirect()->route('song_list')->with('success', 'Song updated successfully!');
    }

    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return redirect()->route('song_list')->with('success', 'Song deleted successfully!');
    }
}
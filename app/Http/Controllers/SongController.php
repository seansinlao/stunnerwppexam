<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs/form')->with([
            'method' => 'POST',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Song::create([
            'title' => $request['title'],
            'artist' => $request['artist'],
            'lyrics' => $request['lyrics'],
        ]);

        $songs = Song::orderBy('id','desc')->get();
        return redirect(route('home'))->with([
            'songs' => $songs,
            'alert' => 'Song Succesfully Added!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        return view('songs/form')->with([
            'song' => $song,
            'method' => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->lyrics = $request->lyrics;
        $song->save();

        $songs = Song::orderBy('id','desc')->get();
        return redirect(route('home'))->with([
            'songs' => $songs,
            'alert' => 'Song Succesfully Edited!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
        $songs = Song::orderBy('id','desc')->get();
        return redirect(route('home'))->with([
            'songs' => $songs,
            'alert' => 'Song Succesfully Deleted!',
        ]);
    }
}

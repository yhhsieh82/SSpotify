<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlaylistsController extends Controller
{
    public function __construct()
    {
        //only the auth user can access the url
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Playlist::all();
        $playlists = DB::table('playlists')->where('owner_id','=', Auth::id())->get();
        return view('playlist.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        $this->authorize('view', $playlist);
        //select * from songs join playlist_song on song_id = songs.id where playlist_id = 1
        $songs = DB::table('songs')
        ->join('playlist_song', function ($join) {
            $join->on('song_id', '=', 'songs.id');
        })->where('playlist_id','=', $playlist->id)->get();
        
        return view('playlist.show', compact('songs','playlist'));
    }

    public function addMusic(Request $request, Playlist $playlist)
    {
        //store in DB
        DB::table('playlist_song')->insert([
            ['playlist_id' => $playlist->id, 'song_id' => $request['song_id']],
        ]);
        //store the flash(session)
        $this->flash('successfully added to the playlist!');
        return redirect("/playlists/$playlist->id");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        DB::table('playlist_song')->where('id', '=', $request["playlist_song_id"])->delete();
        $this->flash('successfully delete the song!');
        return redirect("/playlists/$playlist->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        //
    }
}

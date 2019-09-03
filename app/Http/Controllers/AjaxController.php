<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Playlist;
use Illuminate\Support\Facades\DB;
class AjaxController extends Controller
{
    public function getSong(Request $request){
    	$song = Song::find($request->song_id);
    	return $song;
    }

    public function getArtist(Request $request){
        $artist = DB::table('artists')->where('id', '=', $request->artist_id)->get();
        return $artist;
    }

    public function getAlbum(Request $request){
        $album = DB::table('albums')->where('id', '=', $request->album_id)->get();
        return $album;
    }
    // public function getPlaylist(Request $request){
    // 	$songsIds = DB::table('playlist_song')->join('songs', function ($join) {
    //         $join->on('song_id', '=', 'songs.id');
    //     })->where('playlist_id','=', $request->playlist_id)->select('songs.id')->get();
    //     $ret = array();
    //     foreach( $songsIds as $song ){
    //     	$ret[] = $song->id;
    //     }
    //     return $ret;
    // }
}

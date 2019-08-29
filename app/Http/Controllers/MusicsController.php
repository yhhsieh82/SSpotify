<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Music;
use Illuminate\Http\Request;

class MusicsController extends Controller
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
        //$musics = Music::all();
        $musics = DB::table('musics')->get();
        return view('music.index', compact('musics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('music.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //handle the uploaded file
        if ($request->file('music')){
            if ($request->file('music')->isValid()) {
                $path = $request->file('music')->store('public/musics');
            }
            else{
                dd("file upload unsuccessful");
            }  
        }
        else{
            dd("upload file doesn't exist");
        }
    
        //validate
        $attributes = $request->validate(
            ['name' => 'required|max:255|unique:musics', 
            'description'=>'required']);
        //use mass assignment
        $attributes['owner_id']=auth()->id();
        $attributes['music_path']=$path;
        Music::create($attributes);
        return redirect('/musics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        
        $url = Storage::url( $music->music_path );
        //dd( $music->music_path );
        //$url = $music->music_path;
        //dd($url);
        return view('music.show',compact('music', 'url'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        return view('music.edit', compact('music'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Music $music)
    {
        //handle the uploaded file
        if ($request->file('music')){
            if ($request->file('music')->isValid()) {
                $path = $request->file('music')->store('public/musics');
            }
            else{
                dd("file upload unsuccessful");
            }  
        }
        else{
            dd("upload file doesn't exist");
        }

        $attributes = ['name'=>$request->name, 'description'=>$request->description];
        $attributes['music_path'] = $path;
        $music->update($attributes);
        return redirect('/musics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy(Music $music)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getSong(Request $request){
    	dd('2');
    	dd($request->all());
    	return view('playlists');
    }
}

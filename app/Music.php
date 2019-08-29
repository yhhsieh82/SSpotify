<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = ['name', 'description', 'owner_id', 'music_path'];

    public function owner(){
    	return $this->belongsTo('App\User');
    }
}

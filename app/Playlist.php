<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{    
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'playlist';
    protected $fillable = ['title', 'playlist'];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url'
    ];
    
    public $timestamps = false;
}

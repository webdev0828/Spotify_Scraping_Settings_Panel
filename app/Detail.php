<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{    
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'detail';
    protected $fillable = ['email', 'password'];
    public $timestamps = false;
}

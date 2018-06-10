<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ['message', 'membre_pseudo', 'membre_avatar'];

    protected $dates = ['created_at'];
}

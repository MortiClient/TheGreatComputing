<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = ['titre', 'description', 'miniature', 'type_articles', 'slug', 'redactor_pseudo'];

    protected $dates = ['created_ad', 'updated_at'];
}

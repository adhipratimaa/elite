<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='services';
    protected $fillable=['title','description','image','publish','slug','meta_title','meta_description','writer','keyword','short_description','author','banner_image'];
}

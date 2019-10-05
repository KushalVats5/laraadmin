<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = ['title','content','excerpt','featured_image'];
    protected $guarded = ['featured_image', 'excerpt'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model

{
    use \Conner\Tagging\Taggable;
    protected $fillable = ['title','content','excerpt','featured_image'];
    protected $guarded = ['featured_image', 'excerpt'];

}

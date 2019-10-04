<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    // protected $table = 'navigation';
    protected $fillable = ['title','subtitle'];
    protected $guarded = ['intro', 'description', 'parent_id'];

    public function parent() {

        return $this->hasOne('navigation', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('navigation', 'parent_id', 'id');

    }

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', NULL)->get();

    }

}

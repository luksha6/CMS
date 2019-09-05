<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'created_at', 'modified_at');

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'body',
        'slug',
        'category_id'
        
    ];

    public function category(){

        return $this->belongsTo('App\Models\Category');
    }

    public function tags(){

        return $this->belongsToMany('App\Models\Tag','post__tag');
    }
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post_Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'post_id',
        'tag_id'
    ];
}

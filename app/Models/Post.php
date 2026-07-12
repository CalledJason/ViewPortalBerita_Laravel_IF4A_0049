<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Post extends Model
{
    protected $fillable = [
    'title',
    'content',
    'published',
    ];
}

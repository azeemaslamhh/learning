<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Category;
use App\Models\PostType;

class ProblemList extends Model
{
    use HasFactory;

    protected $fillable = [
        'problem',
        'url',
        'anwser',
        'likes',
        'disLikes',
        'category_id',
        'post_type_id',
        'filename',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function post_type()
    {
        return $this->belongsTo(PostType::class, 'post_type_id', 'id');
    }
}

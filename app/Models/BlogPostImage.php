<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPost;

class BlogPostImage extends Model
{
    use HasFactory;
    protected $fillable = ['image'];

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class, 'blog_post_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPost;

class BlogPostCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function blogPosts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_and_blog_post_categories');
    }
   
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPostCategory;
use App\Models\BlogPostTag;
use App\Models\BlogPostImage;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'image'];


    public function images()
    {
        return $this->hasMany(BlogPostImage::class);
    }

    public function categories()
    {
        return $this->belongsToMany(BlogPostCategory::class, 'blog_post_and_blog_post_categories', 'blog_post_id', 'blog_post_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogPostTag::class, 'blog_post_and_blog_post_tags', 'blog_post_id', 'blog_post_tag_id');
    }
}

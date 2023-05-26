<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProblemList;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_category_id'];


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id', 'id');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class,'parent_category_id');
    }


    public function problem_lists()
    {
        return $this->hasMany(ProblemList::class);
    }
}

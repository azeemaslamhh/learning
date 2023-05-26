<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseCategory;
use App\Models\CourseTag;
use App\Models\CourseInstructor;
class Course extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','price','image'];

    public function categories()
    {
        return $this->hasMany(CourseCategory::class, 'course_and_course_categories','course_category_id');
    }
    public function tags()
    {
        return $this->hasMany(CourseTag::class, 'course_and_course_tags','course_tag_id');
    }
    public function instructors()
    {
        return $this->hasMany(CourseInstructor::class, 'course_and_course_instructors','course_instructor_id');
    }

}
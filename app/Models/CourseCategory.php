<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class CourseCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_and_course_categories', 'course_id', 'course_category_id');
    }

}

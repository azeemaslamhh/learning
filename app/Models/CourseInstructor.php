<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class CourseInstructor extends Model
{
    use HasFactory;

    protected $fillable = ['name','detail','experience','rating','image'];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_and_course_instructors', 'course_id', 'course_instructor_id');
    }
   
}

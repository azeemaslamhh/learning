<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class CourseTag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

   
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_and_course_tags', 'course_id', 'course_tag_id');
    }


}

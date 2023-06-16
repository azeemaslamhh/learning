<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CourseAndCourseTag extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'course_tag_id '];
}

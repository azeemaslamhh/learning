<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class CourseVideo extends Model
{

    protected $fillable = ['video_name', 'video_thumbnail', 'video_description', 'course_id'];

    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

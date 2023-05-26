<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizQuestion;
use App\Models\QuizOption;
use App\Models\QuizResult;

class Quiz extends Model
{
    use HasFactory;

    protected $table = "quizzes";

    protected $fillable = [
        'title', 'meta_text_field'
    ];

    public function quiz_questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id', 'id');
    }


    // 'quiz_option_id', 'id'
    public function quiz_options()
    {
        return $this->hasMany(QuizOption::class, 'quiz_id', 'id');
    }

    public function quiz_results()
    {
        return $this->hasMany(QuizResult::class, 'quiz_result_id', 'id');
    }
}

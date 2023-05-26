<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizQuestion;
use App\Models\Quiz;
use App\Models\QuizResult;

class QuizOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_name', 'correct_option', 'text_field_correct_answer', 'quiz_id', 'quiz_question_id'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }



    public function quiz_question()
    {
        return $this->belongsTo(QuizQuestion::class, 'quiz_question_id', 'id');
    }

    public function quiz_results()
    {
        return $this->hasMany(QuizResult::class, 'quiz_result_id', 'id');
    }
}

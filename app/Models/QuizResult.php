<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizOption;

class QuizResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  'quiz_id', 'quiz_question_id', 'quiz_option_id', 'obtain_score', 'total_score'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    public function quiz_question()
    {
        return $this->belongsTo(QuizQuestion::class, 'quiz_question_id', 'id');
    }
    public function quiz_option()
    {
        return $this->belongsTo(QuizOption::class, 'quiz_option_id', 'id');
    }
}

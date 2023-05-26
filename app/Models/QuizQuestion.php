<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizOption;
use App\Models\Quiz;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'total_score', 'option_type', 'quiz_id'
    ];



    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    public function quiz_options()
    {
        return $this->hasMany(QuizOption::class);

        // return $this->hasMany(QuizOption::class, 'quiz_option_id', 'id');
    }

    public function quiz_results()
    {
        return $this->hasMany(QuizResult::class, 'quiz_result_id', 'id');
    }
}

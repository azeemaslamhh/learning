<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'user_id'];

    public function problem_list()
    {
        return $this->belongsTo(ProblemList::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProblemList;

class PostType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image'];

    public function problem_lists()
    {
        return $this->hasMany(ProblemList::class);
    }
}

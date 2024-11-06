<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    protected $fillable = [
        'user_id',
        'lesson_id',
        'score',
        'is_completed',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lessons()
    {
        return $this->belongsTo(Lesson::class);
    }
}

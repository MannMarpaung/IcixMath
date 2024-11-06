<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'level_id',
        'title',
        'slug',
        'image',
        'content',
    ];

    public function levels()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user_quizzes()
    {
        return $this->hasMany(UserQuiz::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id',
        'answer',
        'status'
    ];

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
}

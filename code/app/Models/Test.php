<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'training_id',
        'question',
        'answer',
        'correct_answer'
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}

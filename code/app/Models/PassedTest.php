<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PassedTest extends Model
{
    protected $table = 'passed_tests';

    protected $fillable = [
        'user_id',
        'training_id',
        'test_date',
        'valid_until'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}

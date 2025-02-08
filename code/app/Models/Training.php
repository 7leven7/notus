<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'name',
        'description',
        'level'
    ];

    public function tests()
    {
        return $this->hasMany(Test::class, 'training_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArrivalNotice extends Model
{
    protected $table = 'arrival_notices';

    protected $fillable = [
        'user_id',
        'arrival_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

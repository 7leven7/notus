<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    protected $table = 'attendance_logs';

    protected $fillable = [
        'user_id',
        'arrival_time',
        'departure_time',
        'signature',
        'gdpr_confirmation'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

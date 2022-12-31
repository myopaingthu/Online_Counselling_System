<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'counsellor_id',
        'appointment_method',
        'appointment_date',
        'appointment_time',
        'user_email',
        'status',
    ];

    /**
     * Get the counsellor that owns the appointment.
     */
    public function counsellor()
    {
        return $this->belongsTo(Counsellor::class);
    }
}

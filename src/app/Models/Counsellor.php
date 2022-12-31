<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Counsellor extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender',
        'age',
    ];

    /**
     * Get the answers associated with the question.
     */
    public function counsellorAnswers()
    {
        return $this->hasMany(CounsellorAnswer::class);
    }
}

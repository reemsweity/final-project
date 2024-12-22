<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'user_id', 'date_time', 'status', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}

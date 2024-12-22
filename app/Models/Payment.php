<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'appointment_id', 'amount', 'status', 'payment_method', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}


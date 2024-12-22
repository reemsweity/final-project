<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id', 'user_id', 'amount', 'payment_method', 'status', 'is_active'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

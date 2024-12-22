<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Contact_msg extends Model
{
    protected $table='contact_msg';
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'msg', 'subject', 'status', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


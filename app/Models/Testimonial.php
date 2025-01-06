<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
protected $table = 'testimonials';
    protected $fillable = [
        'user_id', 'testimonial_text', 'rating',  'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
}


<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'about', 'work_experience', 'year_experience', 'facebook', 'twitter', 'name',
        'available_time', 'profile_img', 'specialization_id','phone','specialization',
        'email', 'password', 'rating', 'phone', 'is_admin_added', 'is_active',
    ];

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);  
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    // In Doctor.php
public function availability()
{
    return $this->hasMany(DoctorAvailability::class);
}

}

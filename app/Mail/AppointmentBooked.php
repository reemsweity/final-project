<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentBooked extends Mailable
{
    use SerializesModels;

    public $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function build()
    {
        return $this->subject('Appointment Booking Confirmation')
                    ->view('emails.appointment-booked')
                    ->with([
                        'zoomLink' => $this->appointment->zoom_link,
                        'zoomId' => $this->appointment->zoom_id,
                    ]);
    }
}

<?php
namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function showAvailableTimes($doctorId)
    {
        // Get doctor details
        $doctor = Doctor::findOrFail($doctorId);
        
        // Get the availability of the doctor
        $availability = $doctor->availability()->get();
        $specialties = Specialization::all();
        // Return the view with the availability
        return view('appointments.book', compact('doctor', 'availability','specialties'));
    }

    // Book an appointment
    public function bookAppointment(Request $request)
{
    // Check if the user is logged in
    if (!auth()->check()) {
        return redirect()->route('user.login.form')->with('error', 'You must be logged in to book an appointment.');
    }

    // Validate the incoming request data
    $validated = $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'user_id' => 'required|exists:users,id',
        'day_of_week' => 'required',
        'start_time' => 'required',
    ]);

    // Combine day_of_week and start_time to create a datetime string
    $dateTime = $validated['day_of_week'] . ' ' . $validated['start_time'];

    // Check for an existing appointment
    $existingAppointment = Appointment::where('doctor_id', $validated['doctor_id'])
        ->where('date_time', $dateTime)
        ->whereIn('status', ['pending', 'confirmed'])
        ->first();

    if ($existingAppointment) {
        return redirect()->route('appointments.book', ['doctorId' => $validated['doctor_id']])
            ->with('error', 'This time slot is already taken. Please choose a different time.');
    }

    // Create the appointment
    $appointment = Appointment::create([
        'doctor_id' => $validated['doctor_id'],
        'user_id' => $validated['user_id'],
        'date_time' => $dateTime,
        'status' => 'pending',
        'is_active' => 1,
    ]);

    session()->flash('success', 'Your appointment is pending and will be confirmed shortly.');

    return redirect()->route('appointments.book', ['doctorId' => $validated['doctor_id']])
        ->with('success', 'Your appointment is pending and will be confirmed shortly.');
}

    

public function updateStatus($appointmentId, $status)
{
    $appointment = Appointment::findOrFail($appointmentId);
    $appointment->status = $status;
    $appointment->save();

    return redirect()->route('appointments.index')->with('success', 'Appointment status updated.');
}



}


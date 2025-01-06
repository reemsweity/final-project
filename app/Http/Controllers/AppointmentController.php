<?php
namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Models\Payment;

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

    // Create the appointment (set status to 'pending' for now)
    $appointment = Appointment::create([
        'doctor_id' => $validated['doctor_id'],
        'user_id' => $validated['user_id'],
        'date_time' => $dateTime,
        'status' => 'pending', // Keep the status as 'pending'
        'is_active' => 1,
    ]);

    // Store the appointment ID in the session to pass it to the payment page
    session()->put('appointment_id', $appointment->id);

    // Redirect to the payment page
    return redirect()->route('appointments.payment', ['appointmentId' => $appointment->id])
        ->with('success', 'Your appointment is pending, please proceed to payment.');
}

    

    

public function updateStatus($appointmentId, $status)
{
    $appointment = Appointment::findOrFail($appointmentId);
    $appointment->status = $status;
    $appointment->save();

    return redirect()->route('appointments.index')->with('success', 'Appointment status updated.');
}

public function paymentPage($appointmentId)
{
    // Get appointment details
    $appointment = Appointment::findOrFail($appointmentId);
    
    // Show payment page with appointment details
    return view('appointments.payment', compact('appointment'));
}

public function processPayment(Request $request, $appointmentId)
{
    $appointment = Appointment::findOrFail($appointmentId);

    // Payment processing logic here (for now it's simulated)
    // You can replace this with your real payment gateway logic like Stripe or PayPal.

    // Simulate payment success (replace this with real payment logic)
    $payment = Payment::create([
        'user_id' => $appointment->user_id,
        'appointment_id' => $appointment->id,
        'amount' => 100, // example amount
        'status' => 'completed', // Set payment status as completed
        'payment_method' => $request->payment_method, // 'credit_card' or 'paypal'
        'is_active' => 1,
    ]);

   
    // Store payment success in session for SweetAlert
    session()->flash('payment_success', true);

    // Redirect to the payment page with a success message
    return redirect()->route('appointments.payment', ['appointmentId' => $appointmentId]);
}







}


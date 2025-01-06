<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function index()
    {
     // Fetch all payments with their related user and appointment
        $payments = Payment::with(['user', 'appointment'])->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.sections.payments.index', compact('payments'));
    }

    public function create()
    {
        return view('admin.sections.payments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'appointment_id' => 'required|exists:appointments,id',
            'status' => 'required|string',
            'payment_method' => 'required|string',
        ]);
    
        // Get the associated appointment and doctor
        $appointment = Appointment::findOrFail($request->appointment_id);
        $doctor = $appointment->doctor; // Assuming the Appointment model has a 'doctor' relationship
    
        // Set the amount to the consultation price of the doctor
        $amount = $doctor->consultation_price;
    
        // Create the payment with the calculated amount
        Payment::create([
            'user_id' => $request->user_id,
            'appointment_id' => $request->appointment_id,
            'amount' => $amount,
            'status' => $request->status,
            'payment_method' => $request->payment_method,
        ]);
    
        return redirect()->route('admin.payments')->with('success', 'Payment added successfully.');
    }
    

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('admin.sections.payments.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $payment->update($request->all());

        return redirect()->route('admin.payments')->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payments')->with('success', 'Payment deleted successfully.');
    }
    
}

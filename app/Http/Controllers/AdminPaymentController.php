<?php

namespace App\Http\Controllers;

use App\Models\Payment;
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
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        Payment::create($request->all());

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

<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['user', 'doctor'])->get();
        
        return view('admin.sections.appointments.index', compact('appointments'));
    }

    public function show($id)
    {
        $appointment = Appointment::with(['user', 'doctor'])->findOrFail($id);
        return view('admin.sections.appointments.show', compact('appointment'));
    }
    public function destroy(Appointment $appointment)
    {

        $appointment->delete();
        return redirect()->route('admin.appointments')->with('success', 'Appointment deleted successfully');
    }

    
}

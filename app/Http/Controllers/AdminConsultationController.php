<?php
namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class AdminConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with(['user', 'doctor'])->get();

        
        return view('admin.sections.consultations.index', compact('consultations'));
    }

    public function show($id)
    {
        $consultation = Consultation::with(['user', 'doctor'])->findOrFail($id);
        return view('admin.sections.consultations.show', compact('consultation'));
    }

    public function destroy(Consultation $consultation)
    {

        $consultation->delete();
        return redirect()->route('admin.consultations')->with('success', 'Consultation deleted successfully');
    }
}

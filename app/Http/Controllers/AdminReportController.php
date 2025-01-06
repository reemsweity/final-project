<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Testimonial;
use App\Models\Contact_msg;
use App\Models\Payment;
use App\Models\Specialization;
use App\Models\Consultation;
use App\Models\Appointment;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index()
    {
        // Fetch counts and summaries for dashboard display
        $data = [
            'users' => User::count(),
            'activeUsers' => User::where('is_active', 1)->count(),
            'inactiveUsers' => User::where('is_active', 0)->count(),
            'reviews'=>Review::count(),
            'doctors' => Doctor::count(),
            'testimonials' => Testimonial::count(),
            'contactMessages' => Contact_msg::count(),
            'payments' => Payment::sum('amount'),
            'specializations' => Specialization::count(),
            'consultations' => Consultation::count(),
            'appointments' => Appointment::count(),
        ];

        // Fetch detailed reports
        $data['bestDoctor'] = Doctor::withCount('reviews')
            ->orderBy('reviews_count', 'desc')
            ->first(['id', 'name', 'reviews_count', 'earnings']);

        $data['topDoctors'] = Doctor::withCount('consultations')
            ->orderBy('consultations_count', 'desc')
            ->take(3)
            ->get(['id', 'name', 'consultations_count', 'earnings']);

        $data['leastConsultedDoctors'] = Doctor::withCount('consultations')
            ->orderBy('consultations_count', 'asc')
            ->take(3)
            ->get(['id', 'name', 'consultations_count']);

        return view('admin.reports.index', compact('data'));
    }

    public function export()
    {
        // Export data to CSV or Excel
        $data = [
            'users' => User::all(),
            'doctors' => Doctor::all(),
            'testimonials' => Testimonial::all(),
            'contactMessages' => Contact_msg::all(),
            'payments' => Payment::all(),
            'specializations' => Specialization::all(),
            'consultations' => Consultation::all(),
            'appointments' => Appointment::all(),
        ];

        // Implement CSV or Excel export logic here
        // For simplicity, we just return JSON in this example
        return response()->json($data);
    }
}

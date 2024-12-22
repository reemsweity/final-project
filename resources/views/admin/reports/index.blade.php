@extends('dashboard')

@section('title', 'Reports')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Reports Dashboard</h2>

    <div class="row g-4">
        <!-- Users -->
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">{{ $data['users'] }}</p>
                </div>
            </div>
        </div>
        <!-- Doctors -->
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Doctors</h5>
                    <p class="card-text">{{ $data['doctors'] }}</p>
                </div>
            </div>
        </div>
        <!-- Testimonials -->
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Testimonials</h5>
                    <p class="card-text">{{ $data['testimonials'] }}</p>
                </div>
            </div>
        </div>
        <!-- Contact Messages -->
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Contact Messages</h5>
                    <p class="card-text">{{ $data['contactMessages'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <!-- Payments -->
        <div class="col-md-3">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">Payments</h5>
                    <p class="card-text">${{ number_format($data['payments'], 2) }}</p>
                </div>
            </div>
        </div>
        <!-- Specializations -->
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Specializations</h5>
                    <p class="card-text">{{ $data['specializations'] }}</p>
                </div>
            </div>
        </div>
        <!-- Consultations -->
        <div class="col-md-3">
            <div class="card text-white bg-dark">
                <div class="card-body">
                    <h5 class="card-title">Consultations</h5>
                    <p class="card-text">{{ $data['consultations'] }}</p>
                </div>
            </div>
        </div>
        <!-- Appointments -->
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Appointments</h5>
                    <p class="card-text">{{ $data['appointments'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Reports Section -->
    <div class="mt-5">
        <h3 class="mb-4">Detailed Reports</h3>
        <div class="row g-4">
            <!-- Best Doctor -->
           <!-- Best Doctor -->
<div class="col-md-6">
    <div class="card shadow-lg border-0" style="background: linear-gradient(135deg, #4caf50, #81c784); color: white;">
        <div class="card-header text-white" style="font-size: 1.25rem; font-weight: bold;">
            Best Doctor
        </div>
        <div class="card-body text-center">
            <h2 class="card-title" style="font-size: 2rem; font-weight: bold;">{{ $data['bestDoctor']['name'] }}</h2>
            
        </div>
    </div>
</div>


            <!-- Top 3 Doctors -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        Top 3 Doctors (By Consultations)
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($data['topDoctors'] as $doctor)
                                <li class="list-group-item">
                                    {{ $doctor['name'] }} 
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctors with Least Consultations -->
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        Doctors with Least Consultations
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($data['leastConsultedDoctors'] as $doctor)
                                <li class="list-group-item">
                                    {{ $doctor['name'] }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.reports.export') }}" class="btn btn-success">Export Data</a>
    </div>
</div>
@endsection

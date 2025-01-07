@extends('dashboard')

@section('title', 'Reports')

@section('content')
<div class="container-fluid p-4" style="background-color: #f8f9fa;">
    <!-- Header Section -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <h2 class="mt-2">Analytics Dashboard</h2>
        </div>
    </div>

    <!-- Main Stats -->
    <div class="row g-3 mb-4">
        <!-- Total Users -->
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100 border-0 rounded-3 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-sm fw-normal text-muted text-uppercase">Total Users</span>
                            <h3 class="mb-0">{{ number_format($data['users']) }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fs-4 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Users -->
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100 border-0 rounded-3 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-sm fw-normal text-muted text-uppercase">Active Users</span>
                            <h3 class="mb-0">{{ number_format($data['activeUsers']) }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fs-4 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inactive Users -->
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100 border-0 rounded-3 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-sm fw-normal text-muted text-uppercase">Inactive Users</span>
                            <h3 class="mb-0">{{ number_format($data['inactiveUsers']) }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-times fs-4 text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Doctors -->
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100 border-0 rounded-3 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-sm fw-normal text-muted text-uppercase">Total Doctors</span>
                            <h3 class="mb-0">{{ number_format($data['doctors']) }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fs-4 text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Appointments Analytics -->
<div class="row g-3 mb-4">
    <!-- Total Appointments -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="d-block fs-sm fw-normal text-muted text-uppercase">Total Appointments</span>
                        <h3 class="mb-0">{{ number_format($data['appointments']) }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-check fs-4 text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Appointments -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="d-block fs-sm fw-normal text-muted text-uppercase">Upcoming Appointments</span>
                        <h3 class="mb-0">{{ number_format($data['upcomingAppointments']) }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-plus fs-4 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Completed Appointments -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="d-block fs-sm fw-normal text-muted text-uppercase">Completed Appointments</span>
                        <h3 class="mb-0">{{ number_format($data['completedAppointments']) }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-check fs-4 text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Missed Appointments -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="d-block fs-sm fw-normal text-muted text-uppercase">Cancelled Appointments</span>
                        <h3 class="mb-0">{{ number_format($data['cancelledAppointments']) }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-times fs-4 text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Secondary Stats -->
    <div class="row g-3 mb-4">
        <!-- Messages & Testimonials -->
        <div class="col-md-6">
            <div class="card border-0 rounded-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="card-title mb-0">Messages & Feedback</h5>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-3 rounded bg-light">
                                <div class="d-flex align-items-center">
                                    
                                    <div>
                                        <div class="small text-muted"><i class="fas fa-comment-dots text-primary fs-4 me-3"></i>Contact Messages</div>
                                        <div class="fs-5 fw-semibold">{{ number_format($data['contactMessages']) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded bg-light">
                                <div class="d-flex align-items-center">
                                    
                                    <div>
                                        <div class="small text-muted"><i class="fas fa-star text-warning fs-4 me-3"></i>Testimonials</div>
                                        <div class="fs-5 fw-semibold">{{ number_format($data['testimonials']) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Payments -->
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100 border-0 rounded-3 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-sm fw-normal text-muted text-uppercase">Total Payments</span>
                            <h3 class="mb-0">{{ number_format($data['totalPayments'], 2) }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fs-4 text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Doctors Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-0 rounded-3 shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h5 class="card-title mb-0"><i class="fas fa-medal text-warning"></i>Top Doctors</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach ($data['topDoctors'] as $doctor)
                            <div class="list-group-item border-0 px-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">{{ $doctor->name }}</h6>
                                        
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.doctors.show', $doctor->id) }}">
                                            <button class="btn btn-sm btn-outline-secondary">View Details</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Doctors Needing Support -->
        <div class="col-md-6">
            <div class="card border-0 rounded-3 shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h5 class="card-title mb-0">   <i class="fas fa-exclamation-circle text-warning"></i>Doctors Needing Support</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach ($data['leastReviewedDoctors'] as $doctor)
                            <div class="list-group-item border-0 px-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">{{ $doctor->name }}</h6>
                                       
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.doctors.show', $doctor->id) }}">
                                            <button class="btn btn-sm btn-outline-secondary">View Details</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    

</div>
@endsection

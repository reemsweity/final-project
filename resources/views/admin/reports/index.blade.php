@extends('dashboard')

@section('title', 'Reports')

@section('content')
<div class="container-fluid p-4" style="background-color: #f8f9fa;">
    <!-- Header Section -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active">Reports</li>
                </ol>
            </nav>
            <h2 class="mt-2">Analytics Dashboard</h2>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Export
                </button>
                <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.reports.export') }}?type=pdf">Export as PDF</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.reports.export') }}?type=excel">Export as Excel</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Stats -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100 border-0 rounded-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-sm fw-normal text-muted text-uppercase">Total Users</span>
                            <h3 class="mb-0">{{ number_format($data['users']) }}</h3>
                        </div>
                        <div class="col-auto">
                            <div class="p-3 bg-primary bg-opacity-10 rounded-circle">
                                <i class="bi bi-people fs-4 text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card h-100 border-0 rounded-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-sm fw-normal text-muted text-uppercase">Active Users</span>
                            <h3 class="mb-0">{{ number_format($data['activeUsers']) }}</h3>
                        </div>
                        <div class="col-auto">
                            <div class="p-3 bg-success bg-opacity-10 rounded-circle">
                                <i class="bi bi-person-check fs-4 text-success"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-success" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card h-100 border-0 rounded-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-sm fw-normal text-muted text-uppercase">Inactive Users</span>
                            <h3 class="mb-0">{{ number_format($data['inactiveUsers']) }}</h3>
                        </div>
                        <div class="col-auto">
                            <div class="p-3 bg-warning bg-opacity-10 rounded-circle">
                                <i class="bi bi-person-dash fs-4 text-warning"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-warning" style="width: 25%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card h-100 border-0 rounded-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-sm fw-normal text-muted text-uppercase">Total Doctors</span>
                            <h3 class="mb-0">{{ number_format($data['doctors']) }}</h3>
                        </div>
                        <div class="col-auto">
                            <div class="p-3 bg-info bg-opacity-10 rounded-circle">
                                <i class="bi bi-heart-pulse fs-4 text-info"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-info" style="width: 50%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Secondary Stats -->
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 rounded-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="card-title mb-0">Messages & Feedback</h5>
                        <div class="ms-auto">
                            <select class="form-select form-select-sm">
                                <option>Last 7 days</option>
                                <option>Last 30 days</option>
                                <option>Last 90 days</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-3 rounded bg-light">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-chat-square-text text-primary fs-4 me-3"></i>
                                    <div>
                                        <div class="small text-muted">Contact Messages</div>
                                        <div class="fs-5 fw-semibold">{{ number_format($data['contactMessages']) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded bg-light">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-star text-warning fs-4 me-3"></i>
                                    <div>
                                        <div class="small text-muted">Testimonials</div>
                                        <div class="fs-5 fw-semibold">{{ number_format($data['testimonials']) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title mb-3">Best Performing Doctor</h5>
                    <div class="text-center py-4">
                        <div class="d-inline-block p-3 rounded-circle bg-success bg-opacity-10 mb-3">
                            <i class="bi bi-award fs-1 text-success"></i>
                        </div>
                        <h4 class="mb-1">{{ $data['bestDoctor']['name'] }}</h4>
                        <div class="text-muted">Top Performance Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Doctor Rankings -->
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card border-0 rounded-3">
                <div class="card-header bg-transparent border-0">
                    <h5 class="card-title mb-0">Top Performing Doctors</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach ($data['topDoctors'] as $index => $doctor)
                            <div class="list-group-item border-0 px-0">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <span class="badge rounded-pill bg-success">#{!! $index + 1 !!}</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $doctor['name'] }}</h6>
                                    </div>
                                    <div class="ms-auto">
                                        <i class="bi bi-arrow-up-circle text-success"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 rounded-3">
                <div class="card-header bg-transparent border-0">
                    <h5 class="card-title mb-0">Doctors Needing Support</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach ($data['leastConsultedDoctors'] as $doctor)
                            <div class="list-group-item border-0 px-0">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <span class="badge rounded-pill bg-warning text-dark">
                                            <i class="bi bi-exclamation-circle"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $doctor['name'] }}</h6>
                                    </div>
                                    <div class="ms-auto">
                                        <button class="btn btn-sm btn-outline-secondary">View Details</button>
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
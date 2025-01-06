@extends('pages.doctors.layouts.app')
@section('content')
@section('breadcrumb', 'Appointment')

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if ($errors->has('zoom_link'))
    <div class="alert alert-danger" role="alert">{{ $errors->first('zoom_link') }}</div>
@endif

<div class="d-flex flex-wrap gap-3 bg-light p-4">
    <div class="card text-white bg-dark" style="width: 100%; max-width: 200px; margin-bottom: 20px;">
        <div class="card-body text-center">
            <img src="{{ $doctor->profile_img ? Storage::url($doctor->profile_img) : asset('default-profile.jpg') }}" alt="Doctor Profile Picture" class="img-fluid rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
            <h5 class="card-title mt-3">Dr. {{ $doctor->name }}</h5>
            <p class="card-text text-success">{{ $doctor->specialization->name }}</p>
            <div class="d-grid gap-2">
                <a href="{{ route('doctor.pages.doctors.profile') }}" class="btn btn-success">Profile</a>
                <a href="{{ url('doctor/appointments') }}" class="btn btn-success">Appointment</a>
                <a href="{{ route('doctor.profile.edit') }}" class="btn btn-success">Edit Profile</a>
            </div>
        </div>
    </div>

    <div class="flex-grow-1" style="max-width: calc(100% - 220px);">
        <div class="mb-4">
            <form action="{{ route('doctor.appointments') }}" method="GET" class="d-flex justify-content-between">
                <select name="status" id="status" class="form-select w-auto" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </form>
        </div>

        @if($appointments->isEmpty())
            <p class="text-muted">You have no upcoming appointments.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-success">
                            <th>Patient Name</th>
                            <th>Appointment Date & Time</th>
                            <th>Zoom Link</th>
                            <th>Zoom Password</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>
                                    <button class="btn btn-link text-success" onclick="openUserModal({{ $appointment->user_id }})">
                                        {{ $appointment->user->name }}
                                    </button>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($appointment->date_time)->format('l, F j, Y, g:i A') }}</td>
                                <td>{{ $appointment->zoom_link ?? 'Not Set' }}</td>
                                <td>{{ $appointment->zoom_pass ?? 'Not Set' }}</td>
                                <td>
                                    <button class="btn btn-success" onclick="openModal({{ $appointment->id }})">Add Zoom Details</button>
                                </td>
                                <td>
                                    <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="form-select w-auto">
                                            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $appointments->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
</div>

<!-- Modal for User Details -->
<div id="userModal" class="modal" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">User Details</h5>
            </div>
            <div class="modal-body" id="userDetails"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="closeUserModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Zoom Details -->
<div id="zoomModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); z-index: 1000;">
    <h3 style="color: #43ba7f; margin-bottom: 15px;width:450px">Add Zoom Details</h3>
    <form id="zoomForm" action="{{ route('appointments.updateZoom') }}" method="POST">
        @csrf
        <input type="hidden" id="appointmentId" name="appointment_id">
        <div style="margin-bottom: 15px;">
            <label for="zoom_link" style="display: block; color: #585858;">Zoom Link</label>
            <input type="text" id="zoom_link" value="{{ old('zoom_link', isset($appointment) ? $appointment->zoom_link : '') }}" name="zoom_link" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="zoom_pass" style="display: block; color: #585858;">Zoom Password</label>
            <input type="text" id="zoom_pass" value="{{ old('zoom_pass', isset($appointment) ? $appointment->zoom_pass : '') }}" name="zoom_pass" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div>
            <button type="submit" style="background-color: #43ba7f; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Save</button>
            <button type="button" onclick="closeModal()" style="background-color: #ff4d4d; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Cancel</button>
        </div>
    </form>
</div>
<div id="modalOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;" onclick="closeModal()"></div>

@endsection

@extends('pages.doctors.layouts.app')
@section('content')
@section('breadcrumb', 'Appointment')
@if(session('success'))
        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->has('zoom_link'))
    <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">{{ $errors->first('zoom_link') }}</div>
@endif
<div class="appointments-section" style="margin-top: 40px; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);">
    <div class="filter-section" style="margin-bottom: 20px;">
        <form action="{{ route('doctor.appointments') }}" method="GET">
            <label for="status" style="color: #43ba7f; font-weight: bold;">Filter by Status:</label>
            <select name="status" id="status" onchange="this.form.submit()" style="padding: 10px; margin-left: 10px; width:300px;">
                <option value="">All</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </form>
    </div>

   
    

    <!-- Show doctor appointments -->
    @if($appointments->isEmpty())
        <p style="color: #585858;">You have no upcoming appointments.</p>
    @else
        <div class="table-responsive">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Patient Name</th>
                        <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Appointment Date & Time</th>
                        <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Zoom Link</th>
                       
                        <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Zoom Password</th>
                        <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Action</th>
                        <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 10px;">
                                <button class="btn" onclick="openUserModal({{ $appointment->user_id }})" style="background: none; color: #43ba7f; border: none; cursor: pointer;">
                                    {{ $appointment->user->name }}
                                </button>
                            </td>
                            <td style="padding: 10px;">{{ \Carbon\Carbon::parse($appointment->date_time)->format('l, F j, Y, g:i A') }}</td>
                            <td style="padding: 10px;">{{ $appointment->zoom_link ?? 'Not Set' }}</td>
                            <td style="padding: 10px;">{{ $appointment->zoom_pass ?? 'Not Set' }}</td>
                            <td style="padding: 10px;">
                                <button class="btn btn-primary" onclick="openModal({{ $appointment->id }})" style="background-color: #43ba7f; color: #ffffff; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Add Zoom Details</button>
                            </td>
                            <td style="padding: 10px;">
                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" style="padding: 5px; border: 1px solid #ddd; border-radius: 5px;">
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
            <div class="pagination-wrap">
                {{ $appointments->links('pagination::bootstrap-4') }}
            </div>
        </div>
    @endif
</div>

<!-- Modal for User Details -->
<div id="userModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); z-index: 1000;">
    <h3 style="color: #43ba7f; margin-bottom: 15px; width:450px">User Details</h3>
    <div id="userDetails"></div> <!-- User Details will be loaded here -->
    <button onclick="closeUserModal()" style="background-color: #ff4d4d; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Close</button>
</div>



<div id="zoomModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); z-index: 1000;">
    <h3 style="color: #43ba7f; margin-bottom: 15px;width:450px">Add Zoom Details</h3>
    <form id="zoomForm" action="{{ route('appointments.updateZoom') }}" method="POST">
        @csrf
        <input type="hidden" id="appointmentId" name="appointment_id">
        <div style="margin-bottom: 15px;">
            <label for="zoom_link" style="display: block; color: #585858;">Zoom Link</label>
            <input type="text" id="zoom_link" name="zoom_link" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="zoom_pass" style="display: block; color: #585858;">Zoom Password</label>
            <input type="text" id="zoom_pass" name="zoom_pass" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div>
            <button type="submit" style="background-color: #43ba7f; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Save</button>
            <button type="button" onclick="closeModal()" style="background-color: #ff4d4d; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Cancel</button>
        </div>
    </form>
</div>
<div id="modalOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;" onclick="closeModal()"></div>



@endsection

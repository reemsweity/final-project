@extends('dashboard')

@section('title', 'Appointments')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Appointments Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Search Input -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <input type="text" id="searchAppointments" class="form-control w-50" placeholder="Search for appointments...">
    </div>

    <table id="appointmentsTable" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Doctor</th>
                <th>Date & Time</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr class="text-center align-middle">
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->user->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->date_time }}</td>
                    <td>
                        <span class="badge {{ $appointment->availability == 'available' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($appointment->availability) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <!-- View Button -->
                            <a href="{{ route('admin.appointments.show', $appointment->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="fas fa-eye"></i>  <!-- Eye icon for View -->
                            </a>
                          
                            <!-- Delete Button -->
                            <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('styles')
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#appointmentsTable').DataTable({
            // Enable case-insensitive search
            search: {
                caseInsensitive: true
            }
        });

        // Search functionality for the table
        $('#searchAppointments').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
@endsection

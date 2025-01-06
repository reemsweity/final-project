@extends('dashboard')

@section('title', 'Manage Users')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Users Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Search Input -->
        <input type="text" id="searchDoctors" class="form-control w-50" placeholder="Search by any field...">

        <!-- Filter by Status -->
        <select id="statusFilter" class="form-select w-25">
            <option value="">All Status</option>
            <option value=1>Active</option>
            <option value=0>Inactive</option>
        </select>
    </div>

    <!-- Wrap the table in a responsive container -->
    <div class="table-responsive">
        <table id="example" class="table table-sm table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Status Value (Hidden)</th> <!-- Hidden column for filtering -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="text-center align-middle">
                        <td>{{ $user->id }}</td>
                        <td>
                            <img src="{{ asset($user->profile_img) }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        </td>
                        
                        <td>{{ Str::limit($user->name, 15) }}</td>
                        <td>
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="is_active" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value=1 {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
                                    <option value=0 {{ $user->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </form>
                        </td>
                        <td class="d-none">{{ $user->is_active }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm me-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" id="delete-form-{{ $user->id }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteDoctor({{ $user->id }})">
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
</div>

@endsection

@section('scripts')
<!-- Include DataTables Library -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Include SweetAlert Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   $(document).ready(function() {
    // Initialize DataTable
    var table = $('#example').DataTable({
        searching: true, // Enable global search
        search: {
            caseInsensitive: true // Make search case-insensitive
        },
        columnDefs: [
            {
                targets: 4, // Hidden column with the actual status value
                visible: false // Hide the status column
            }
        ]
    });

    // Custom Search Functionality
    $('#searchDoctors').on('keyup', function() {
        table.search(this.value).draw(); // Perform search on table
    });

    $('#statusFilter').on('change', function() {
        var status = this.value;
        if (status === '') {
            table.column(4).search('').draw(); // Reset the filter
        } else {
            // Apply filter to the hidden status column (index 6)
            table.column(4).search('^' + status + '$', true, false).draw();
        }
    });
});

function deleteDoctor(doctorId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the delete form
            document.getElementById(`delete-form-${doctorId}`).submit();
        }
    });
}

</script>
@endsection

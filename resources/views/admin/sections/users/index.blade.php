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

    <!-- Custom Search Input -->
    <div class="mb-3">
        <label for="searchDoctors" class="form-label">Search Users</label>
        <input type="text" id="searchDoctors" class="form-control" placeholder="Search by any field...">
    </div>

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Create New User</a>
    <table id="example" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Email</th>
                
                <th>Phone</th>
                <th>Age</th>
                <th>Status</th>
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
                    <td>{{ Str::limit($user->email, 20) }}</td>
                   
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->age }}</td>
                    <td>
                        <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
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

@section('scripts')
<!-- Include DataTables Library -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#example').DataTable({
            searching: true, // Enable global search
            search: {
                caseInsensitive: true // Make search case-insensitive
            }
        });

        // Custom Search Functionality
        $('#searchDoctors').on('keyup', function() {
            table.search(this.value).draw(); // Perform search on table
        });
    });
</script>
@endsection

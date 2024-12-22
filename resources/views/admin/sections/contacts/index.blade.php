@extends('dashboard')

@section('title', 'Contact Messages')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Contact Messages Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Search and Filter Section -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Search Input -->
        <input type="text" id="searchMessages" class="form-control w-50" placeholder="Search for messages...">

        <!-- Filter by Status -->
        <select id="statusFilter" class="form-select w-25">
            <option value="">All Status</option>
            <option value="unread">Unread</option>
            <option value="read">Read</option>
        </select>
    </div>

    <table id="messagesTable" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Status Value (Hidden)</th> <!-- Hidden column for filtering -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contactMessages as $message)
                <tr class="text-center align-middle" data-status="{{ $message->status }}">
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->phone }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>
                        <!-- Badge for Status -->
                        @if($message->status == 'unread')
                            <span class="badge bg-warning text-dark">Unread</span>
                        @else
                            <span class="badge bg-success">Read</span>
                        @endif
                    </td>
                    <!-- Hidden column with the actual status value -->
                    <td class="d-none">{{ $message->status }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <!-- View Button -->
                            <a href="{{ route('admin.contact_messages.show', $message->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="fas fa-eye"></i> <!-- Eye icon for View -->
                            </a>
                            <!-- Mark as Read Button -->
                            @if($message->status == 'unread')
                                <form action="{{ route('admin.contact_messages.markAsRead', $message->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm me-1">Mark as Read</button>
                                </form>
                            @else
                                <form action="{{ route('admin.contact_messages.markAsUnread', $message->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning btn-sm me-1">Mark as Unread</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No messages found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- <div class="mt-3">
        {{ $contactMessages->links() }} <!-- Pagination links -->
    </div> --}}
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
        var table = $('#messagesTable').DataTable({
            search: {
                caseInsensitive: true
            },
            columnDefs: [
                {
                    targets: 6, // Target the hidden status column (index 6)
                    visible: false // Hide the status column
                }
            ]
        });

        // Search functionality for the table
        $('#searchMessages').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Filter by Status functionality
        $('#statusFilter').on('change', function() {
            var status = this.value;
            if (status === '') {
                table.column(6).search('').draw();  // Search the hidden status column
            } else {
                table.column(6).search('^' + status + '$', true, false).draw();  // Filter by the selected status (read/unread)
            }
        });
    });
</script>
@endsection

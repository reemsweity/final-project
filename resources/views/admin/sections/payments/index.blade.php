@extends('dashboard')

@section('title', 'Manage Payments')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Payments Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Custom Search Input -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Search Input -->
        <input type="text" id="searchPayments" class="form-control w-50" placeholder="Search for payments...">
        
        <!-- Status Filter -->
        <select id="statusFilter" class="form-select w-25">
            <option value="">All</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="failed">Failed</option>
        </select>
    </div>

   
    <table id="example" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Status Value (Hidden)</th> <!-- Hidden column for filtering -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr class="text-center align-middle">
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->user->name }}</td>
                    <td>${{ number_format($payment->amount, 2) }}</td>
                    <td>
                        <span class="badge 
                            @if($payment->status == 'pending') bg-warning 
                            @elseif($payment->status == 'completed') bg-success 
                            @elseif($payment->status == 'failed') bg-danger 
                            @endif">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td>{{  $payment->created_at ? $payment->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                    <!-- Hidden column with the actual status value -->
                    <td class="d-none">{{ $payment->status }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            
                            <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" class="d-inline">
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
        // Initialize DataTable with custom search column for status
        var table = $('#example').DataTable({
            searching: true, // Enable global search
            search: {
                caseInsensitive: true // Make search case-insensitive
            },
            columnDefs: [
                {
                    targets: 5, // Target the hidden status column (index 5)
                    visible: false // Hide the status column
                }
            ]
        });

        // Custom Search Functionality
        $('#searchPayments').on('keyup', function() {
            table.search(this.value).draw(); // Perform search on table
        });

        // Custom Status Filter Functionality
        $('#statusFilter').on('change', function() {
            var selectedStatus = $(this).val();
            if (selectedStatus) {
                table.column(5).search('^' + selectedStatus + '$', true, false).draw(); // Filter based on the raw status value
            } else {
                table.column(5).search('').draw(); // Show all if no status is selected
            }
        });
    });
</script>

@endsection

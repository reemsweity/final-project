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
        
        
    </div>

    <div class="table-responsive">
    <table id="example" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Amount</th>
                <th>Date</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr class="text-center align-middle">
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->user->name }}</td>
                    <td>${{ number_format($payment->amount, 2) }}</td>
                   
                    <td>{{  $payment->created_at ? $payment->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                   
                    
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

<script>
    $(document).ready(function() {
        // Initialize DataTable with custom search column for status
        var table = $('#example').DataTable({
            searching: true, // Enable global search
            search: {
                caseInsensitive: true // Make search case-insensitive
            },
          
        });

        // Custom Search Functionality
        $('#searchPayments').on('keyup', function() {
            table.search(this.value).draw(); // Perform search on table
        });

       
    });
</script>

@endsection

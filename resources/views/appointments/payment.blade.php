@extends('pages.app')
@section('title', 'Payment')
@section('breadcrumb', 'Payment')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm" >
            <div class="card-body">
                <h1 class="card-title text-center text-success mb-4">Confirm Payment for Your Appointment</h1>

                <div class="mb-4">
                    <h5 class="font-weight-bold">Doctor:</h5>
                    <p class="text-muted">{{ $appointment->doctor->name }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="font-weight-bold">Specialty:</h5>
                    <p class="text-muted">{{ $appointment->doctor->specialization->name }}</p>
                </div>
                <div class="mb-4">
                    <h5 class="font-weight-bold">Consultation Price:</h5>
                    <p class="text-muted">{{ $appointment->doctor->consultation_price }} JOD</p>
                </div>

                <div class="mb-4">
                    <h5 class="font-weight-bold">Date and Time:</h5>
                    <p class="text-muted">{{ $appointment->date_time }}</p>
                </div>

                <!-- Payment Form -->
                <form action="{{ route('appointments.processPayment', ['appointmentId' => $appointment->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="payment_method" class="font-weight-bold">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success btn-block mt-4">Make Payment</button>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- SweetAlert Success Confirmation -->
    @if (session('payment_success'))
        <script>
            Swal.fire({
                title: 'Payment Successful!',
                text: 'Your appointment is now pending confirmation and will be confirmed soon.',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#43ba7f',
                background: '#ffffff',
                allowOutsideClick: false
            }).then(function() {
                // Optionally, redirect to a different page after the alert
                window.location.href = "{{ route('user.doctors') }}"; // Or wherever you want
            });
        </script>
    @endif
@endsection

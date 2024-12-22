@extends('dashboard')

@section('title', 'Add Payment')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add New Payment</h2>

    <form action="{{ route('admin.payments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <label for="user_id" class="col-sm-2 col-form-label">User</label>
            <div class="col-sm-10">
                <select class="form-select" id="user_id" name="user_id" required>
                    <option value="" selected disabled>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="appointment_id" class="col-sm-2 col-form-label">Appointment</label>
            <div class="col-sm-10">
                <select class="form-select" id="appointment_id" name="appointment_id" required>
                    <option value="" selected disabled>Select Appointment</option>
                    @foreach ($appointments as $appointment)
                        <option value="{{ $appointment->id }}" {{ old('appointment_id') == $appointment->id ? 'selected' : '' }}>
                            {{ $appointment->id }} - {{ $appointment->date }}
                        </option>
                    @endforeach
                </select>
                @error('appointment_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="amount" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="payment_method" class="col-sm-2 col-form-label">Payment Method</label>
            <div class="col-sm-10">
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="" selected disabled>Select Method</option>
                    <option value="credit_card" {{ old('payment_method') == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="paypal" {{ old('payment_method') == 'paypal' ? 'selected' : '' }}>PayPal</option>
                    <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                </select>
                @error('payment_method')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select class="form-select" id="status" name="status" required>
                    <option value="" selected disabled>Select Status</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="is_active" class="col-sm-2 col-form-label">Is Active</label>
            <div class="col-sm-10">
                <select class="form-select" id="is_active" name="is_active">
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('is_active')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Payment</button>
        <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

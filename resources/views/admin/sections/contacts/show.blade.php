@extends('dashboard')

@section('title', 'View Contact Message')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Contact Message Details</h2>

    <!-- Contact Message Details -->
    <div class="card">
        <div class="card-header">
            <h4>Contact Message Information</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label font-weight-bold">Name:</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $contactMessage->name }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label font-weight-bold">Email:</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $contactMessage->email }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label font-weight-bold">Phone:</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $contactMessage->phone }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label font-weight-bold">Subject:</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $contactMessage->subject }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label font-weight-bold">Message:</label>
                <div class="col-sm-9">
                    <div class="border p-3 rounded bg-light">
                        <p class="form-control-plaintext">{{ $contactMessage->msg }}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label font-weight-bold">Status:</label>
                <div class="col-sm-9">
                    <span class="badge {{ $contactMessage->status == 'unread' ? 'bg-danger' : 'bg-success' }}">
                        {{ ucfirst($contactMessage->status) }}
                    </span>
                </div>
            </div>
        </div>
        
    </div>
    <a href="{{ route('admin.contact_messages.index') }}" class="btn btn-secondary mt-4">Back to Contact List</a>
</div>
@endsection

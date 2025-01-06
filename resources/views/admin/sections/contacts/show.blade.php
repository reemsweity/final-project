@extends('dashboard')

@section('title', 'View Contact Message')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Contact Message Details</h2>

    <!-- Contact Message Details -->
    <div class="card">
       
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
                    <span class="badge {{ $contactMessage->status == 'unread' ? 'bg-warning' : 'bg-success' }}">
                        {{ ucfirst($contactMessage->status) }}
                    </span>
                </div>
            </div>

            <!-- Buttons for Mark as Read/Unread -->
            <div class="row mb-3">
                <div class="col-sm-9 offset-sm-3">
                    @if($contactMessage->status == 'unread')
                        <form action="{{ route('admin.contact_messages.markAsRead', $contactMessage->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm me-1">Mark as Read</button>
                        </form>
                    @else
                        <form action="{{ route('admin.contact_messages.markAsUnread', $contactMessage->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm me-1">Mark as Unread</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.contact_messages.index') }}" class="btn btn-secondary mt-4">Back to Contact List</a>
</div>
@endsection

@extends('pages.doctors.layouts.app')
@section('content')

<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 bg-dark text-white p-4 rounded mb-4 mb-md-0">
            <div class="text-center mb-4">
                <img src="{{ $doctor->profile_img ? Storage::url($doctor->profile_img) : asset('default-profile.jpg') }}" alt="Doctor Profile Picture" 
                    class="img-fluid rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                <h3 class="mt-3">Dr. {{ $doctor->name }}</h3>
                <p class="text-success">{{ $doctor->specialization->name }}</p>
            </div>
            <div class="d-flex flex-column gap-3">
                <a href="{{ route('doctor.pages.doctors.profile') }}" class="btn btn-success text-white py-2 rounded">
                    Profile
                </a>
                <a href="{{ url('doctor/appointments') }}" class="btn btn-success text-white py-2 rounded">
                    Appointment
                </a>
                <a href="{{ route('doctor.profile.edit') }}" class="btn btn-success text-white py-2 rounded">
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 bg-white p-4 rounded shadow-lg">
            <div class="row gy-4">
                <div class="col-12 col-md-6">
                    <section>
                        <h2 class="text-success border-bottom pb-2 mb-3" style="font-size: 1.3rem;">Email</h2>
                        <p class="text-secondary">{{ $doctor->email ?? 'No information available' }}</p>
                    </section>
                </div>

                <div class="col-12 col-md-6">
                    <section>
                        <h2 class="text-success border-bottom pb-2 mb-3" style="font-size: 1.3rem;">Phone</h2>
                        <p class="text-secondary">{{ $doctor->phone ?? 'Not Provided' }}</p>
                    </section>
                </div>
            </div>

            <section>
                <h2 class="text-success border-bottom pb-2 mb-3" style="font-size: 1.3rem;">About</h2>
                <p class="text-secondary">{{ $doctor->about ?? 'No information available' }}</p>
            </section>

            <section>
                <h2 class="text-success border-bottom pb-2 mb-3" style="font-size: 1.3rem;">Work Experience</h2>
                <p class="text-secondary">{{ $doctor->work_experience ?? 'No information available' }}</p>
            </section>

            <div class="row gy-4">
                <div class="col-12 col-md-6">
                    <section>
                        <h2 class="text-success border-bottom pb-2 mb-3" style="font-size: 1.3rem;">Experience Years</h2>
                        <p class="text-secondary">{{ $doctor->year_experience ?? 'No information available' }}</p>
                    </section>
                </div>

                <div class="col-12 col-md-6">
                    <section>
                        <h2 class="text-success border-bottom pb-2 mb-3" style="font-size: 1.3rem;">Available Time</h2>

                        @if($doctor->availability->isEmpty())
                            <p class="no-availability-message">
                                You don't have any available time set. 
                                <a href="{{ route('doctor.profile.edit', $doctor->id) }}" class="text-primary">Go to the edit page</a> to add your available time.
                            </p>
                        @else
                            @foreach($doctor->availability as $availability)
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-secondary mb-0">
                                        <strong>{{ $availability->day_of_week }}:</strong> {{ $availability->start_time }} - {{ $availability->end_time }}
                                    </p>
                                    <form action="{{ route('doctor.availability.delete', $availability->id) }}" method="POST" class="ms-3" id="delete-form-{{ $availability->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $availability->id }})">Delete</button>
                                    </form>
                                </div>
                            @endforeach
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

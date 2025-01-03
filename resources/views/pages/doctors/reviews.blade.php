


    <div class="container">
        <div class="doctor-profile">
            <div class="doctor-info">
                <img src="{{ Storage::url($doctor->profile_img) }}" alt="Doctor Profile Picture" class="doctor-profile-img">
                <h3>{{ $doctor->name }}</h3>
                <p><strong>Specialization:</strong> {{ $doctor->specialization->name }}</p>
                <p><strong>About:</strong> {{ $doctor->about ?? 'No information available' }}</p>
            </div>
            
            <div class="doctor-reviews">
                <h4>Reviews for Dr. {{ $doctor->name }}</h4>
                @forelse ($reviews as $review)
                    <div class="review">
                        <p><strong>{{ $review->user->name }}</strong> (Rating: {{ $review->rating }} / 5)</p>
                        <p>{{ $review->comment }}</p>
                        <hr>
                    </div>
                @empty
                    <p>No reviews yet for this doctor.</p>
                @endforelse
            </div>
        </div>
    </div>

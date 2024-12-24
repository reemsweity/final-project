<div class="reviews-section" style="background-color: #f8f9fa; padding: 40px 20px;">
    <h2 style="font-size: 1.5rem; color: #2d2d2d; margin-bottom: 20px;">Reviews</h2>

    @forelse($reviews as $review)
        <div style="background-color: #ffffff; padding: 20px; margin-bottom: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
            <p style="color: #2d2d2d; font-weight: 500;">{{ $review->user->name ?? 'Anonymous' }}</p>
            <p style="color: #666666; line-height: 1.6;">{{ $review->comment }}</p>
            <p style="font-size: 0.9rem; color: #999999;">{{ $review->created_at->format('F j, Y') }}</p>
        </div>
    @empty
        <p style="color: #666666;">No reviews available for this doctor.</p>
    @endforelse

    <!-- Pagination Links -->
    <div style="margin-top: 20px;">
        {{ $reviews->links() }}
    </div>
</div>

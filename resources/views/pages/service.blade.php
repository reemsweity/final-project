@extends('pages.app')
@section('content')
@section('title','About-us')
@section('breadcrumb', 'Services')
    <section class="service-section">
        <div class="container">
            <div class="section-title-wrap">
               
                <h2 class="section-title">The Best Quality Service You Can Get</h2>
            </div>

            <div class="services-grid">
                <!-- Service Card Loop -->
                @foreach ($specializations as $item)
                    <div class="service-card">
                        <!-- Service Icon -->
                        <img src="{{ $item->icon ? asset('storage/' . $item->icon) : asset('images/default-icon.png') }}"
                            alt="{{ $item->name }}" class="service-icon">
                        
                        <!-- Service Title -->
                        <h3 class="service-title">{{ $item->name }}</h3>
                        
                        <!-- Service Description -->
                        <p class="service-description">{{ $item->description }}</p>
                        
                       
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

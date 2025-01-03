<!DOCTYPE html>
<!-- This site was created in Webflow. https://webflow.com --><!-- Last Published: Wed May 22 2024 10:44:37 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="medcare-template.webflow.io" data-wf-page="65c992c37023d69385565ad5"
    data-wf-site="65c992c37023d69385565acc" lang="en">
<!-- Mirrored from medcare-template.webflow.io/home-page/home-one by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:04 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Home | MedCare - Webflow HTML Website Template</title>
    <meta
        content="Medcare is a health care website template perfect for any healthcare website. This healthcare Webflow template combines the needs of medical, doctor, medicine, hospital, and clinical templates. It is ideal for creating a professional medical website."
        name="description" />
    <meta content="Home | MedCare - Webflow HTML Website Template" property="og:title" />
    <meta
        content="Medcare is a health care website template perfect for any healthcare website. This healthcare Webflow template combines the needs of medical, doctor, medicine, hospital, and clinical templates. It is ideal for creating a professional medical website."
        property="og:description" />
    <meta content="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65f16188631a7cf790a0cb7b_graph.jpg"
        property="og:image" />
    <meta content="Home | MedCare - Webflow HTML Website Template" property="twitter:title" />
    <meta
        content="Medcare is a health care website template perfect for any healthcare website. This healthcare Webflow template combines the needs of medical, doctor, medicine, hospital, and clinical templates. It is ideal for creating a professional medical website."
        property="twitter:description" />
    <meta content="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65f16188631a7cf790a0cb7b_graph.jpg"
        property="twitter:image" />
    <meta property="og:type" content="website" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link
        href="../../assets-global.website-files.com/65c992c37023d69385565acc/css/medcare-template.webflow.1b5882e1f.css"
        rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>
    <link href="{{ asset('doc_on_call_logo_icon.png') }}"
    rel="shortcut icon"  />
    <link
        href="../../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9dc398a42023d2fd60f43_webclip_256x256px.png"
        rel="apple-touch-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div id="Scroll-Top" class="page-wrapper">
        <section class="header-section">
            <div class="w-layout-blockcontainer container w-container">
                <div class="header-nav-block">
                    <div data-animation="over-left" data-collapse="medium" data-duration="400" data-easing="ease"
                        data-easing2="ease" role="banner" class="header-nav-inner-block w-nav">
                        <div class="header-navbar-wrapper">
                            <!-- Logo -->
                            <a href="{{ url('home') }}" class="navbar-logo w-nav-brand">
                                <img src="{{ asset('doc-on-call-logo-modern.svg') }}" loading="lazy" alt="Logo Image" class="logo" />
                            </a>
                            

                            <nav role="navigation" class="nav-menu-wrap w-nav-menu">
                                <div class="nav-menu-list-wrapper">
                                    <ul role="list" class="nav-menu w-list-unstyled">
                                        <li class="mobile-logo-wrap">
                                            <a href="{{ url('home') }}" class="navbar-logo w-nav-brand">
                                                <img src="{{ asset('doc-on-call-logo-modern.svg') }}"
                                                    loading="lazy" alt="Logo Image" class="logo" />
                                            </a>
                                        </li>
                                        <li class="menu-list"><a href="{{ url('home') }}" class="menu-link">Home</a>
                                        </li>
                                        <li class="menu-list"><a href="{{ url('about') }}" class="menu-link">About</a>
                                        </li>
                                        <li class="menu-list"><a href="{{ url('doctors') }}"
                                                class="menu-link">Doctors</a></li>
                                        {{-- <li class="menu-list">
                                            <a href="{{ url('appointment') }}"
                                                class="menu-link">Appointment</a>
                                            </li> --}}
                                        
                                                {{-- <li class="menu-list">
                                                    <form id="specializationFilterForm" method="GET" action="{{ route('user.doctors') }}" style="margin: 0; width: auto; display: inline-block;">
                                                        <select class="menu-link" name="specialization_id" 
                                                                id="specializationDropdown" 
                                                                onchange="document.getElementById('specializationFilterForm').submit()"
                                                                style="width: 130px; padding: 8px; border: none; background: transparent; font-size: 1rem; cursor: pointer; outline: none;">
                                                            <option value="">Specialties</option>
                                                            <option value="">All Specialties</option>
                                                            @foreach ($specialties as $specialty)
                                                                <option value="{{ $specialty->id }}" {{ request('specialization_id') == $specialty->id ? 'selected' : '' }}>
                                                                    {{ $specialty->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </li> --}}
                                                <li class="menu-list"> <a href="{{ url('contact-us') }}"
                                                    class="menu-link">Contact Us</a></li>
                                                <li class="menu-list"><a href="{{ url('doctor/profile') }}" class="menu-link">Login as Doctor</a></li>
                                            
                                            </ul>



                                    <div class="nav-menu-button-wrapper">

                                        <!-- Conditional Authentication Links -->
                                        @if (Auth::check())
                                            <!-- Profile Dropdown -->

                                            <a href="#" class="menu-link dropdown-toggle menu-list dropdown"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ Auth::user()->profile_img ? asset(Auth::user()->profile_img) : asset('default-profile.jpg') }}"
                                                 alt="Profile Image"
                                                 style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;" />
                                            {{ Auth::user()->name }}
                                         </a>
                                         
                                            <ul class="dropdown-menu"
                                                style="background-color: #ffffff; border-radius: 5px; padding: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                                                <li><a href="{{ route('profile') }}" class="dropdown-item">Profile</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('user.logout') }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item"
                                                            style="color: #e74c3c; border: none; background: none; cursor: pointer;">Logout</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        @else
                                            <!-- Sign In Link -->
                                            <a href="{{ url('user/login') }}"
                                                class="button-outline w-button menu-list">Sign In</a>
                                        @endif
                                    </div>
                                </div>
                            </nav>

                            <!-- Mobile Menu Button -->
                            <div class="menu-button w-nav-button">
                                <div class="mobile-menu-icon w-icon-nav-menu"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="main-wrapper">
            <section class="hero-section-one">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="hero-section-one-wrapper">
                        <div class="hero-one-content-wrap">

                            <h1 data-w-id="778cb215-a381-7c36-0955-1631fbe1aa94" style="opacity:0"
                                class="hero-title">
                                Consult Doctors via <span class="hero-title-span">Zoom</span>
                            </h1>
                            <p data-w-id="134f05df-769a-6964-b42e-602bbfd1a5ee" style="opacity:0"
                                class="hero-title-description">Get expert medical advice with DocOnCall. Book your Zoom
                                consultation and care for your health from home.</p>
                            <div data-w-id="d15f8d27-be74-8fb0-5519-d596708b9fdf" style="opacity:0"
                                class="appointment-button-wrap"><a href="{{ url('doctors') }}"
                                    class="button-primary w-inline-block">
                                    <div class="button-primary-text">View Our Doctors</div>
                                    
                                </a></div>
                                
                            {{-- fillter --}}

                        </div>
                        <div id="w-node-ff38df3b-6a2c-fe5f-116b-44db66cae648-85565ad5"
                            data-w-id="ff38df3b-6a2c-fe5f-116b-44db66cae648" style="opacity:0"
                            class="hero-one-banner-wrap"><img
                                src="../../cdn.prod.website-files.com/65c992c37023d69385565acc/65cb03c7c409125210deb105_banner-dr-img.png"
                                loading="lazy" alt="Banner image" class="hero-one-banner-image" /></div><img
                            src="../../cdn.prod.website-files.com/65c992c37023d69385565acc/65cb0b22d5c6859bd68e4761_hero-one-rectangle.png"
                            loading="lazy" data-w-id="3974cc98-0237-a0b1-5c3e-af39c94d27d6"
                            id="w-node-_3974cc98-0237-a0b1-5c3e-af39c94d27d6-85565ad5" alt="Rectangle Shape"
                            class="hero-bg-rectangle-shape" />
                    </div>
                </div>
                <div class="hero-section-one-bg-shape"></div>
            </section>
            <section class="service-section section-gap-y-axis-140px">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="service-section-wrapper">
                        <div class="section-title-wrap center">
                            <div class="section-sub-title">Services</div>
                            <h2 class="section-title service">The Best Quality Service You Can Get</h2>
                        </div>
                        <div class="service-slider w-slider" data-delay="4000" data-animation="slide"
                            data-autoplay="false" data-easing="ease" style="opacity:1" data-hide-arrows="false"
                            data-disable-swipe="false" data-nav-spacing="3" data-duration="500"
                            data-infinite="true">
                            <div class="service-slider-mask w-slider-mask">
                                @foreach ($specializations as $item)
                                    <div class="service-slider-item w-slide">
                                        <div class="department-slider-card">
                                            <div class="department-icon-wrapper">
                                                @if ($item->icon)
                                                    <img alt="{{ $item->name }}" loading="lazy"
                                                        src="{{ asset('storage/' . $item->icon) }}" />
                                                @else
                                                    <img alt="Default Icon" loading="lazy"
                                                        src="{{ asset('images/default-icon.png') }}"
                                                        class="department-icon" />
                                                @endif
                                            </div>

                                            <div class="department-slider-content">

                                                <h3 class="department-name department-name-link">{{ $item->name }}
                                                </h3>

                                                <p class="department-short-details">{{ $item->description }}</p>
                                                <div class="learn-more-wrap">
                                                    <a href="" class="learn-more-link-wrap w-inline-block">
                                               
                                                        
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="department-card-hover-shadow"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="department-slider-arrow left w-slider-arrow-left">
                                <div class="department-slider-icon w-embed">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.66586 9.99995C6.66523 9.89028 6.68625 9.78156 6.72772 9.68003C6.76919 9.5785 6.83029 9.48615 6.90753 9.40828L11.9075 4.40828C12.0644 4.25136 12.2773 4.16321 12.4992 4.16321C12.7211 4.16321 12.9339 4.25136 13.0909 4.40828C13.2478 4.5652 13.3359 4.77803 13.3359 4.99995C13.3359 5.22187 13.2478 5.4347 13.0909 5.59162L8.67419 9.99995L13.0825 14.4083C13.219 14.5677 13.2904 14.7728 13.2823 14.9825C13.2742 15.1922 13.1872 15.3912 13.0388 15.5396C12.8904 15.688 12.6915 15.7749 12.4817 15.783C12.272 15.7911 12.0669 15.7198 11.9075 15.5833L6.90753 10.5833C6.75357 10.4281 6.66678 10.2186 6.66586 9.99995Z"
                                            fill="currentcolor" />
                                    </svg>
                                </div>
                            </div>
                            <div class="department-slider-arrow right w-slider-arrow-right">
                                <div class="department-slider-icon w-embed">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M13.3341 10C13.3348 10.1097 13.3138 10.2184 13.2723 10.32C13.2308 10.4215 13.1697 10.5138 13.0925 10.5917L8.09247 15.5917C7.93555 15.7486 7.72272 15.8368 7.50081 15.8368C7.27889 15.8368 7.06606 15.7486 6.90914 15.5917C6.75222 15.4348 6.66406 15.222 6.66406 15C6.66406 14.7781 6.75222 14.5653 6.90914 14.4084L11.3258 10L6.91747 5.59172C6.78095 5.4323 6.70961 5.22723 6.71771 5.0175C6.72581 4.80777 6.81276 4.60882 6.96117 4.46041C7.10958 4.312 7.30853 4.22506 7.51826 4.21696C7.72799 4.20886 7.93305 4.28019 8.09247 4.41672L13.0925 9.41672C13.2464 9.57193 13.3332 9.78143 13.3341 10Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="doctor-section padding-bottom-140px">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="doctors-wrapper">
                        <div class="section-header-wrap d-flex">
                            <div class="section-title-wrap">
                                <div class="section-sub-title">Our Doctors</div>
                                <h2 class="section-title doctor">Receive Care from Our Expert Doctors</h2>
                            </div>
                            <a href="{{ url('doctors') }}" class="button-outline w-button">View All Doctors</a>
                        </div>
                        <div class="doctor-card-grid-block margin-top-60px">
                            <div class="doctor-collection-list-wrapper">
                                <div role="list" class="doctor-collection-list grid-2 w-dyn-items">
                                    @foreach ($topDoctors as $doctor)
                                        <div role="listitem" class="doctor-card-item w-dyn-item">
                                            <div class="doctor-card-wrap">
                                                <a href="{{ route('user.doctorsdetailes', $doctor->id) }}"
                                                    class="dr-image-link w-inline-block">
                                                    <img src="{{ Storage::url($doctor->profile_img) }}"
                                                        alt="Profile Image" class="dr-img">
                                                </a>

                                                <div class="doctor-info-wrap">

                                                    <div
                                                        class="doctor-designation doctor-designation-link w-inline-block">
                                                        {{ $doctor->specialization ? $doctor->specialization->name : 'N/A' }}
                                                    </div>


                                                    <a href="{{ route('user.doctorsdetailes', $doctor->id) }}"
                                                        class="doctor-name-link w-inline-block">
                                                        <div class="doctor-name">{{ $doctor->name }}</div>
                                                    </a>

                                                    <div class="review-block">
                                                        <div class="start-icon w-embed">
                                                            @php
                                                                $rating = $doctor->rating;
                                                            @endphp
                                                            @if ($rating >= 1)
                                                                &#9733; <!-- Full star (★) -->
                                                            @else
                                                                &#9734; <!-- Empty star (☆) -->
                                                            @endif
                                                        </div>
                                                        <div class="patient-review">{{ $rating }}</div>
                                                    </div>

                                                    <a href="{{ url('appointments/book/' . $doctor->id) }}"
                                                        class="book-appoinment-link-wrap w-inline-block">
                                                        <div class="book-appointment-link-text">Book Appointment <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M16.9998 11.9922C17.0007 12.1567 16.9692 12.3198 16.907 12.472C16.8448 12.6243 16.7532 12.7628 16.6373 12.8796L9.1384 20.3785C8.90306 20.6139 8.58386 20.7461 8.25103 20.7461C7.9182 20.7461 7.599 20.6139 7.36366 20.3785C7.12831 20.1432 6.99609 19.824 6.99609 19.4912C6.99609 19.1583 7.12831 18.8391 7.36366 18.6038L13.9877 11.9922L7.37615 5.38068C7.1714 5.14158 7.06441 4.83403 7.07656 4.51948C7.08871 4.20494 7.2191 3.90655 7.44169 3.68397C7.66428 3.46138 7.96266 3.33098 8.27721 3.31883C8.59176 3.30668 8.89931 3.41368 9.1384 3.61843L16.6373 11.1174C16.8682 11.3501 16.9984 11.6644 16.9998 11.9922Z"
                                                                fill="currentcolor" />
                                                        </svg>
                                                        </div>
                                                        <div class="learn-more-icon w-embed">
                                                            <!-- Arrow SVG -->
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="doctor-card-hover-shadow"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- home.blade.php -->
            <section class="testimonial-section padding-bottom-140px">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="section-title-wrap center">
                        <div class="section-sub-title">Testimonial</div>
                        <h2 class="section-title text-center">What Our Patients Say About Us</h2>
                    </div>
                    <div class="testimonial-slider-wrapper">
                        <div class="testimonial-slider w-slider" data-autoplay="true" data-easing="ease"
                            data-infinite="true">
                            <div class="testimonial-slider-mask w-slider-mask">
                                @foreach ($testimonials as $testimonial)
                                    <div class="testimonial-slider-item w-slide">
                                        <div class="testimonial-slider-card">
                                            <!-- Patient Profile Image -->
                                            <div class="patient-profile-wrapper">
                                                <img alt="Department Icon" loading="lazy"
                                                    src="{{ $testimonial->user->profile_img }}"
                                                    style="width: 100px; height: 100px; object-fit: cover; border-radius:50%" />
                                            </div>
                                            <!-- Testimonial Content -->
                                            <div class="testimonail-slider-content">
                                                <div class="testimonail-patient-name">{{ $testimonial->user->name }}
                                                </div>
                                                <div class="patient-designation">{{ $testimonial->user->designation }}
                                                </div>
                                                <p class="department-short-details">
                                                    {{ $testimonial->testimonial_text }}</p>
                                                <div class="patient-star-review-block">
                                                    @for ($i = 0; $i < $testimonial->rating; $i++)
                                                        <span style="color: green">★</span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="testimonial-card-hover-shadow"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="testimonial-slider-arrow left w-slider-arrow-left">
                                <div class="department-slider-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.66586 9.99995C6.66523 9.89028 6.68625 9.78156 6.72772 9.68003C6.76919 9.5785 6.83029 9.48615 6.90753 9.40828L11.9075 4.40828C12.0644 4.25136 12.2773 4.16321 12.4992 4.16321C12.7211 4.16321 12.9339 4.25136 13.0909 4.40828C13.2478 4.5652 13.3359 4.77803 13.3359 4.99995C13.3359 5.22187 13.2478 5.4347 13.0909 5.59162L8.67419 9.99995L13.0825 14.4083C13.219 14.5677 13.2904 14.7728 13.2823 14.9825C13.2742 15.1922 13.1872 15.3912 13.0388 15.5396C12.8904 15.688 12.6915 15.7749 12.4817 15.783C12.272 15.7911 12.0669 15.7198 11.9075 15.5833L6.90753 10.5833C6.75357 10.4281 6.66678 10.2186 6.66586 9.99995Z"
                                            fill="currentcolor" />
                                    </svg></div>
                            </div>
                            <div class="testimonial-slider-arrow right w-slider-arrow-right">
                                <div class="department-slider-icon w-embed"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M13.3341 10C13.3348 10.1097 13.3138 10.2184 13.2723 10.32C13.2308 10.4215 13.1697 10.5138 13.0925 10.5917L8.09247 15.5917C7.93555 15.7486 7.72272 15.8368 7.50081 15.8368C7.27889 15.8368 7.06606 15.7486 6.90914 15.5917C6.75222 15.4348 6.66406 15.222 6.66406 15C6.66406 14.7781 6.75222 14.5653 6.90914 14.4084L11.3258 10L6.91747 5.59172C6.78095 5.4323 6.70961 5.22723 6.71771 5.0175C6.72581 4.80777 6.81276 4.60882 6.96117 4.46041C7.10958 4.312 7.30853 4.22506 7.51826 4.21696C7.72799 4.20886 7.93305 4.28019 8.09247 4.41672L13.0925 9.41672C13.2464 9.57193 13.3332 9.78143 13.3341 10Z"
                                            fill="currentColor" />
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



         
            
        </div>
        <section class="footer-section">
            <div class="w-layout-blockcontainer container w-container">
                <div class="footer-block-wrapper">
                    <div data-w-id="930cbbf2-e22c-508e-4443-ba9f31767a12" class="footer-content">
                        <div id="w-node-_930cbbf2-e22c-508e-4443-ba9f31767a13-31767a0f" class="footer-block"><a
                                href="{{ url('home') }}" class="footer-logo-link-block w-inline-block"> <img src="{{ asset('doc-on-call-logo-modern.svg') }}" loading="lazy" alt="Logo Image" class="logo" /></a>
                            <div class="footer-address">Revolutionizing healthcare with expert advice and virtual care
                            </div>
                            <div class="social-block"><a href="https://www.facebook.com/" target="_blank"
                                    class="footer-social-link w-inline-block"><img
                                        src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caef5f57fd0cc188939b25_facebook.svg"
                                        loading="lazy" alt="Facebook Icon" class="social-image" /><img
                                        src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caf2bd6ac28d88edb0269b_facebook-white.svg"
                                        loading="lazy" alt="Facebook Icon" class="social-image-white" /></a><a
                                    href="https://twitter.com/" target="_blank"
                                    class="footer-social-link w-inline-block"><img
                                        src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caf1a53bcc792a5eb37255_twitter.svg"
                                        loading="lazy" alt="Twitter Icon" class="social-image" /><img
                                        src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caef749128b2ae1a08b938_twitter-fill.svg"
                                        loading="lazy" alt="Twitter Icon" class="social-image-white" /></a><a
                                    href="https://www.linkedin.com/" target="_blank"
                                    class="footer-social-link w-inline-block"><img
                                        src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caef3fef54fca04c9327c2_ri_linkedin-fill.svg"
                                        loading="lazy" alt="Linkdin" class="social-image" /><img
                                        src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caf2da90c78bb550df41dc_linkedin-white.svg"
                                        loading="lazy" alt="Linkdin" class="social-image-white" /></a><a
                                    href="https://www.instagram.com/" target="_blank"
                                    class="footer-social-link w-inline-block"><img
                                        src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caf1cdcf665b1c4ff072bb_instagram.svg"
                                        loading="lazy" alt="Instragram" class="social-image" /><img
                                        src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caf2e967afff45c74d5c2a_instagram-white.svg"
                                        loading="lazy" alt="Instragram" class="social-image-white" /></a></div>
                        </div>
                        <div class="footer-block">
                            <div class="footer-title">Menu</div>
                            <div class="footer-link-wrapper"><a href="{{ url('home') }}"
                                    class="footer-link">Home</a>
                                    <a href="{{ url('about') }}"
                                    class="footer-link">About</a>
                                  
                                    <a href="{{ url('doctors') }}"
                                    class="footer-link">Doctors</a>
                                    <a href="{{ url('contact-us') }}"
                                    aria-current="page" class="footer-link w--current">Contact</a></div>
                        </div>

                        <div class="footer-block">
                            <div class="footer-title">Contact</div>
                            <div class="footer-link-wrapper">
                                <a href="mailto:contact@medcare.com" class="footer-link">DocOnCall@gmail.com</a><a
                                    href="tel:5055550125" class="footer-link">(505) 555-0125</a>
                            </div>
                        </div>
                        <div class="footer-block">


                        </div>
                    </div>
                    <div data-w-id="930cbbf2-e22c-508e-4443-ba9f31767a4d" class="copy-right-block">
                        <div class="footer-copyright-center">Copyright © <a href="{{ url('home') }}"
                                class="template-link">DocOnCall</a></div>
                    </div>
                </div>
            </div>
        </section>
    </div><a href="#Scroll-Top" data-w-id="30c71d29-e3fa-3339-ca90-a7a70999142b"
        class="scroll-to-top w-inline-block"><img
            src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65e7e75caa3c9f54b384abff_arrow-up.svg"
            loading="lazy" alt="Arrow Image" class="arrow-icon" /></a>
    <script src="../../d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c843fc.js?site=65c992c37023d69385565acc"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script src="../../assets-global.website-files.com/65c992c37023d69385565acc/js/webflow.e72dc5e5f.js"
        type="text/javascript"></script>
</body>
<!-- Mirrored from medcare-template.webflow.io/home-page/home-one by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:13 GMT -->

</html>

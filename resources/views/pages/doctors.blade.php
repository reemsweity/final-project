<!DOCTYPE html>
<!-- This site was created in Webflow. https://webflow.com --><!-- Last Published: Wed May 22 2024 10:44:37 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="medcare-template.webflow.io" data-wf-page="65e40ce026880298571bc1d9"
    data-wf-site="65c992c37023d69385565acc" lang="en">
<!-- Mirrored from medcare-template.webflow.io/doctors by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:16 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Doctors</title>
    <meta content="Doctors" property="og:title" />
    <meta content="Doctors" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/medcare-template.webflow.1b5882e1f.css"
        rel="stylesheet" type="text/css" />
        <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/doctor.css"
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
    <link href="../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9dc398a42023d2fd60f43_webclip_256x256px.png"
        rel="apple-touch-icon" />
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
                                <img src="{{ asset('doc-on-call-logo-modern.svg') }}"
                                    loading="lazy" alt="Logo Image" class="logo" />
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
                                                <li class="menu-list"><a href="{{ url('services') }}" class="menu-link">Services</a></li>
                                                <li class="menu-list"> <a href="{{ url('contact-us') }}"
                                                    class="menu-link">Contact Us</a></li>
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
            <section class="breadcrumb-section">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="breadcrumb-wrapper">
                        <div class="breadcrumb-title-block">
                            <h1 class="breadcumb-title">Our Doctors</h1>
                            <div class="home-page-back-link-wrap"><a href="{{ url('home') }}"
                                    class="page-link">Home</a>
                                <div class="divider">/</div>
                                <div class="page-name">Doctors</div>
                            </div>
                        </div>
                        <div data-w-id="edb8d2b1-a65e-64c1-2ee4-696f2e07ae41" class="breadcrumb-shape-block">
                            <div class="inside-vector-wrap"><img
                                    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65c9e13f750e419cee597826_Inside-vector-semi-small.svg"
                                    loading="lazy" alt="Vector" class="inside-vector-semi-small" /><img
                                    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65c9de018f2da12e347fcd04_Inside-vector-small.svg"
                                    loading="lazy" alt="Vector" class="inside-vector-small" /><img
                                    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65c9e204960864bf2bf89d45_Inside-vector-medium.svg"
                                    loading="lazy" alt="Vector" class="inside-vector-medium" /><img
                                    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65c9e2c5ec86042bc9b16610_Inside-vector-large.svg"
                                    loading="lazy" alt="Vector" class="inside-vector-large" /><img
                                    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65c9e4d5c6aa622c9820a98d_Inside-vector-semi-large.svg"
                                    loading="lazy" alt="Vector" class="inside-vector-semi-large" /></div>
                        </div>
                    </div>
                </div><img
                    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65c9da79c4f7ccc63241e432_Outside-vector-large.svg"
                    loading="lazy" alt="Vector" class="outside-vector-large" />
            </section>
            
            <section class="doctor-main-section section-gap-y-axis-100px">
                 <div class="doctor-section-sidebar-wrap" style=" ">
                            <div class="doctor-specialty-dropdown-wrap" style="position: relative; width: 100%;">
                                <div class="doctor-specialty-dropdown-toggle" style="background-color: #ffffff; border-radius: 10px; padding: 12px 15px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); display: flex; align-items: center;">
                                    <div style="display: flex; align-items: center; gap: 12px; width: 100%;">
                                        <div class="dr-icon-wrap" style="width: 24px; height: 24px; display: flex; align-items: center;">
                                            <img loading="lazy" 
                                                 src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65cb24f45d745af651685712_dr-icon.svg" 
                                                 alt="DR Icon" 
                                                 style="width: 100%; height: 100%; object-fit: contain;">
                                        </div>
                                        
                                        <form id="specializationFilterForm" method="GET" action="{{ route('user.doctors') }}" style="margin: 0; width: 100%;">
                                            <select name="specialization_id" 
                                                    id="specializationDropdown" 
                                                    onchange="document.getElementById('specializationFilterForm').submit()"
                                                    style="width: 100%; 
                                                           padding: 8px;
                                                           border: none; 
                                                           background: transparent; 
                                                           color: #43ba7f; 
                                                           font-size: 1rem; 
                                                           cursor: pointer;
                                                           outline: none;">
                                                
                                                <option value="">All Specialties</option>
                                                @foreach ($specialties as $specialty)
                                                    <option value="{{ $specialty->id }}" {{ request('specialization_id') == $specialty->id ? 'selected' : '' }}>
                                                        {{ $specialty->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="w-layout-blockcontainer container w-container">
                    <div data-w-id="c67e9d41-faca-76c1-25c7-b71855690eb1" style="opacity:0"
                        class="doctor-main-section-wrapper">
                       
                        <div class="doctor-card-grid-block main">
                            <div class="doctor-collection-list-wrapper w-dyn-list">
                                <div role="list" class="doctor-collection-list grid-4 w-dyn-items">
                                    @foreach ($doctors as $doctor)
                                        <div role="listitem" class="doctor-card-item w-dyn-item">
                                            <div class="doctor-card-wrap">
                                                <a href="{{ route('user.doctorsdetailes', $doctor->id) }}" class="dr-image-link w-inline-block">
                                                    @if($doctor->profile_img)
                                                    <img src="{{ Storage::url($doctor->profile_img) }}" alt="Profile Image" class="dr-img">
                                                @else
                                                <img src="{{asset('default-profile.jpg') }}" alt="Profile Image" class="dr-img" >
                                                @endif
                                                </a>
                                    
                                                <div class="doctor-info-wrap">
                                                    <div class="doctor-designation doctor-designation-link w-inline-block">
                                                        {{ $doctor->specialization ? $doctor->specialization->name : 'N/A' }}
                                                    </div>
                                                
                                                    <a href="{{ route('user.doctorsdetailes', $doctor->id) }}" class="doctor-name-link w-inline-block">
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
                                    
                                                    <a href="{{ url('appointments/book/' . $doctor->id) }}" class="book-appoinment-link-wrap w-inline-block">
                                                        <div class="book-appointment-link-text">Book Appointment <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M16.9998 11.9922C17.0007 12.1567 16.9692 12.3198 16.907 12.472C16.8448 12.6243 16.7532 12.7628 16.6373 12.8796L9.1384 20.3785C8.90306 20.6139 8.58386 20.7461 8.25103 20.7461C7.9182 20.7461 7.599 20.6139 7.36366 20.3785C7.12831 20.1432 6.99609 19.824 6.99609 19.4912C6.99609 19.1583 7.12831 18.8391 7.36366 18.6038L13.9877 11.9922L7.37615 5.38068C7.1714 5.14158 7.06441 4.83403 7.07656 4.51948C7.08871 4.20494 7.2191 3.90655 7.44169 3.68397C7.66428 3.46138 7.96266 3.33098 8.27721 3.31883C8.59176 3.30668 8.89931 3.41368 9.1384 3.61843L16.6373 11.1174C16.8682 11.3501 16.9984 11.6644 16.9998 11.9922Z"
                                                                fill="currentcolor" />
                                                        </svg></div>
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
                        
                                <!-- Pagination links with custom styling -->
                                <div class="pagination-wrap">
                                    {{ $doctors->links('pagination::bootstrap-4') }}
                                </div>
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
                                    class="footer-link">Home</a><a href="{{ url('about') }}"
                                    class="footer-link">About</a>
                                    <a href="{{ url('doctors') }}"
                                    class="footer-link">Doctors</a>
                                    <a href="{{ url('services') }}"
                                    class="footer-link">Services</a>
                                    <a href="{{ url('contact-us') }}"
                                    aria-current="page" class="footer-link w--current">Contact Us</a></div>
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
    </div><a href="#Scroll-Top" class="scroll-to-top w-inline-block"><img
            src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65e7e75caa3c9f54b384abff_arrow-up.svg"
            loading="lazy" alt="Arrow Image" class="arrow-icon" /></a>
    <script src="../d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c843fc.js?site=65c992c37023d69385565acc"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script src="../assets-global.website-files.com/65c992c37023d69385565acc/js/webflow.e72dc5e5f.js"
        type="text/javascript"></script>
</body>
<!-- Mirrored from medcare-template.webflow.io/doctors by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:19 GMT -->

</html>  
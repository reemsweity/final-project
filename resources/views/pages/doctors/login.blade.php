<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Doctor Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
    href="../../assets-global.website-files.com/65c992c37023d69385565acc/css/doctor1.css"
    rel="stylesheet" type="text/css" />
    <link href="{{asset('assets-global.website-files.com/65c992c37023d69385565acc/css/medcare-template.webflow.1b5882e1f.css')}}"
    rel="stylesheet" type="text/css" />
    <link href="{{asset('assets-global.website-files.com/65c992c37023d69385565acc/css/doctor.css')}}"
    rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="Scroll-Top" class="page-wrapper">
        <section class="header-section">
            <div class="w-layout-blockcontainer container w-container" style=" max-width: 90%;">
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
    <div class="auth-wrapper d-flex align-items-center justify-content-center py-5">
       
        <div class="container">
            <div class="row g-0 auth-card bg-white overflow-hidden" style="max-width: 1000px; margin: 0 auto;">
                <div class="col-12 col-md-6 p-5">
                    <div class="text-center mb-5">
                        <img src="{{ asset('doc-on-call-logo-modern.svg') }}" alt="Logo" class="img-fluid" style="max-width: 200px;">
                    </div>
                    
                    <h2 class="text-center mb-4">Welcome, <span class="welcome-text">Doctor!</span></h2>
                    <p class="text-center text-muted mb-5">Please log in to your account</p>
                    
                    <form method="POST" action="{{ route('doctor.login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" name="email" 
                                       placeholder="Enter your email">
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" 
                                       placeholder="Enter your password">
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mb-4">
                            <a href="forgot-password.html" class="forgot-link">Forgot password?</a>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">
                            Log In
                        </button>
                    </form>
                </div>
                <div class="col-12 col-md-6 auth-image d-none d-md-block"></div>
            </div>
        </div>
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
                                class="footer-link">Doctors</a><a href="{{ url('services') }}"
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</div><a href="#Scroll-Top" class="scroll-to-top w-inline-block"><img
    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65e7e75caa3c9f54b384abff_arrow-up.svg"
    loading="lazy" alt="Arrow Image" class="arrow-icon" /></a>
<script src="../d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c843fc.js?site=65c992c37023d69385565acc"
type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
</script>
<script src="../assets-global.website-files.com/65c992c37023d69385565acc/js/webflow.e72dc5e5f.js"
type="text/javascript"></script>
</body>
</html>
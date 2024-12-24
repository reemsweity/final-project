<!DOCTYPE html>
<!-- This site was created in Webflow. https://webflow.com --><!-- Last Published: Wed May 22 2024 10:44:37 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="medcare-template.webflow.io" data-wf-page="65d4764ee7b13fa3a0d19948"
    data-wf-site="65c992c37023d69385565acc" lang="en">
<!-- Mirrored from medcare-template.webflow.io/contact-us by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:21 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Contact Us</title>
    <meta content="Contact Us" property="og:title" />
    <meta content="Contact Us" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/medcare-template.webflow.1b5882e1f.css"
        rel="stylesheet" type="text/css" />
        <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/doctor.css"
        rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('doc_on_call_logo_icon.png') }}"
    rel="shortcut icon"  />
    <link href="../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9dc398a42023d2fd60f43_webclip_256x256px.png"
        rel="apple-touch-icon" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main id="Scroll-Top" class="page-wrapper">
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
                                        
                                                <li class="menu-list">
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
                                                </li>
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
            <section class="breadcrumb-section">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="breadcrumb-wrapper">
                        <div class="breadcrumb-title-block">
                            <h1 class="breadcumb-title">Contact Us</h1>
                            <div class="home-page-back-link-wrap"><a href="{{ url('home') }}"
                                    class="page-link">Home</a>
                                <div class="divider">/</div>
                                <div class="page-name">Contact Us</div>
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
            
            <section class="contact-card-section padding-top-140px">
                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                <div class="w-layout-blockcontainer container w-container">
                    <div class="section-title-wrap">
                        <h2 class="section-title contact">Reach Out for Health and Wellness Assistance Today!</h2>
                    </div>
                    <div class="contact-card-wrapper margin-top-60px">
                        <div data-w-id="4c033d8e-4a2c-d51d-51fb-61ad13b14f7f">


                        </div>
                        <div data-w-id="4c033d8e-4a2c-d51d-51fb-61ad13b14f8a"
                            style="-webkit-transform:translate3d(0, 0, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                            class="contact-card-block phone">
                            <div class="contct-card-icon-wrap phone"><img
                                    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65d46bdd61a0aa9412a2f4db_phone-white.svg"
                                    loading="lazy" alt="Phone" class="contact-card-icon" /></div>
                            <div class="contact-card-contect-wrap">
                                <div class="contct-card-title">Phone number</div><a href="tel:0987654567"
                                    class="contact-card-info">+098(765)4567</a><a href="tel:55501118765"
                                    class="contact-card-info">(808) 555-0111-8765</a>
                            </div>
                        </div>
                        <div data-w-id="4c033d8e-4a2c-d51d-51fb-61ad13b14f95"
                            style="-webkit-transform:translate3d(0, 0, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                            class="contact-card-block email">
                            <div class="contct-card-icon-wrap email"><img
                                    src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65d46d515f57bc0fdbb72064_email-white.svg"
                                    loading="lazy" alt="Email" class="contact-card-icon" /></div>
                            <div class="contact-card-contect-wrap">
                                <div class="contct-card-title">Email</div><a href="mailto:debra.holt@example.com"
                                    class="contact-card-info">DocOnCall@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="Contact" class="contact-form-section section-gap-y-axis-140px">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="contact-form-wrapper">
                        <div class="section-title-wrap align-center margin-bottom-60px">
                            <div class="section-sub-title">Get in Touch</div>
                            <h2 class="section-title contact-form">Contact Us for Personalized Assistance and Quick
                                Resolutions.</h2>
                        </div>
                        <div data-w-id="e8a05263-4748-4225-d06a-987795bf759b" style="opacity:0"
                            class="contact-input-form-block">
                            
                            <form action="{{ route('contact.store') }}" method="POST" id="Email-Form"
                                name="wf-form-Email-Form" class="contact-form"
                                data-wf-page-id="65d4764ee7b13fa3a0d19948"
                                data-wf-element-id="6e174fed-6400-b7d6-a197-6a5a3c743dab">
                                @csrf
                                <div class="contact-input-field-grid">
                                    <input
                                        class="contact-input-field w-node-_6e174fed-6400-b7d6-a197-6a5a3c743dae-a0d19948 w-input"
                                        maxlength="256" name="name" id="name" data-name="Name"
                                        placeholder="Your name" type="text" required />

                                    <input class="contact-input-field w-input" maxlength="256" name="email"
                                        id="email" data-name="Email" placeholder="Enter your email"
                                        type="email" required />

                                    <input class="contact-input-field w-input" maxlength="256" name="phone"
                                        id="phone" data-name="Phone" placeholder="Your phone number"
                                        type="tel" />

                                    <input class="contact-input-field w-input" maxlength="256" name="subject"
                                        id="subject" data-name="Subject" placeholder="Write your subject"
                                        type="text" required />
                                </div>
                                <textarea placeholder="Write your message..." maxlength="5000" id="msg" name="msg" data-name="Field"
                                    class="contact-input-textaria w-input" required></textarea>
                                <input type="submit" data-wait="Please wait..."
                                    class="button-primary center w-button" value="Send Message" />
                            </form>

                            <div class="w-form-done">
                                <div>Thank you! Your submission has been received!</div>
                            </div>
                            <div class="w-form-fail">
                                <div>Oops! Something went wrong while submitting the form.</div>
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
                                    {{-- <a href="{{ url('appointment') }}"
                                    class="footer-link">Appointment</a> --}}
                                    <a href="{{ url('doctors') }}"
                                    class="footer-link">Doctors</a><a href="{{ url('contact-us') }}"
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
    </main><a href="#Scroll-Top" class="scroll-to-top w-inline-block"><img
            src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65e7e75caa3c9f54b384abff_arrow-up.svg"
            loading="lazy" alt="Arrow Image" class="arrow-icon" /></a>
    <script src="../d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c843fc.js?site=65c992c37023d69385565acc"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script src="../assets-global.website-files.com/65c992c37023d69385565acc/js/webflow.e72dc5e5f.js"
        type="text/javascript"></script>
</body>
<!-- Mirrored from medcare-template.webflow.io/contact-us by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:21 GMT -->

</html>

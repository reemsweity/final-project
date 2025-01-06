<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sign Up</title>
    <meta content="Sign Up" property="og:title" />
    <meta content="Sign Up" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/medcare-template.webflow.1b5882e1f.css" rel="stylesheet" type="text/css" />
    <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/doctor.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>
    <link href="{{ asset('doc_on_call_logo_icon.png') }}" rel="shortcut icon" />
    <link href="../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9dc398a42023d2fd60f43_webclip_256x256px.png" rel="apple-touch-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets-global.website-files.com/65c992c37023d69385565acc/css/doctor1.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <section class="header-section">
        <div class="w-layout-blockcontainer container w-container" style="max-width: 90%;">
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
                                    <li class="menu-list"><a href="{{ url('home') }}" class="menu-link">Home</a></li>
                                    <li class="menu-list"><a href="{{ url('about') }}" class="menu-link">About</a></li>
                                    <li class="menu-list"><a href="{{ url('doctors') }}" class="menu-link">Doctors</a></li>
                                    <li class="menu-list"><a href="{{ url('services') }}" class="menu-link">Services</a></li>
                                    <li class="menu-list"> <a href="{{ url('contact-us') }}" class="menu-link">Contact Us</a></li>
                                </ul>
                                <div class="nav-menu-button-wrapper">
                                    @if (Auth::check())
                                        <!-- Profile Dropdown -->
                                        <a href="#" class="menu-link dropdown-toggle menu-list dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ Auth::user()->profile_img ? asset(Auth::user()->profile_img) : asset('default-profile.jpg') }}" alt="Profile Image" style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;" />
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" style="background-color: #ffffff; border-radius: 5px; padding: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                                            <li><a href="{{ route('profile') }}" class="dropdown-item">Profile</a></li>
                                            <li><form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item" style="color: #e74c3c; border: none; background: none; cursor: pointer;">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="{{ url('user/login') }}" class="button-outline w-button menu-list">Sign In</a>
                                    @endif
                                </div>
                            </div>
                        </nav>
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

                    <h2 class="text-center mb-4">Create a New Account</h2>

                    <form method="POST" action="{{ route('user.signup') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone number</label>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </form>

                    <div class="login-condition-block mt-4">
                        <div class="login-conditon-title">Already have an account? <a href="{{ route('user.login') }}" class="register-link"><span class="hero-title-span">Login</span></a></div>
                    </div>
                </div>

                <div class="col-12 col-md-6 auth-image d-none d-md-block">
                    <img src="../cdn.prod.website-files.com/65c992c37023d69385565acc/65e6e12b4f03e2d8440da7a9_authentication%20-banner.jpg" alt="Authentication Banner" class="img-fluid">
                </div>
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
</body>
</html>

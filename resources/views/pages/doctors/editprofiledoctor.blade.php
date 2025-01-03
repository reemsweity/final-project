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
    <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/doctor.css" rel="stylesheet"
        type="text/css" />
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>
    <link href="{{ asset('doc_on_call_logo_icon.png') }}" rel="shortcut icon" />
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
                            <a href="" class="navbar-logo w-nav-brand">
                                <img src="{{ asset('doc-on-call-logo-modern.svg') }}" loading="lazy" alt="Logo Image"
                                    class="logo" />
                            </a>

                            <nav role="navigation" class="nav-menu-wrap w-nav-menu">
                                <div class="nav-menu-list-wrapper"
                                    style="display: flex; justify-content: space-between; width: 100%;">
                                    <ul role="list" class="nav-menu w-list-unstyled"
                                        style="display: flex; align-items: center;">
                                        <li class="mobile-logo-wrap">
                                            <a href="{{ url('home') }}" class="navbar-logo w-nav-brand">
                                                <img src="{{ asset('doc-on-call-logo-modern.svg') }}" loading="lazy"
                                                    alt="Logo Image" class="logo" />
                                            </a>
                                        </li>
                                        <li class="menu-list">
                                            <a href="{{ url('home') }}" class="menu-link">Home</a>
                                        </li>
                                        <li class="menu-list"><a href="{{ url('doctor/appointments') }}"
                                                class="menu-link">Appointments</a></li>
                                        <li class="menu-list"><a href="{{ url('doctor/profile') }}"
                                                class="menu-link">Profile</a></li>


                                    </ul>

                                    <div class="nav-menu-button-wrapper" style="display: flex; align-items: center;">
                                        @if (auth()->guard('doctor')->check())
                                            <form action="{{ route('doctor.logout') }}" method="POST">
                                                @csrf
                                                <button class="button-outline w-button menu-list"
                                                    style="color: red; border:1px solid red">Logout</button>
                                            </form>
                                        @else
                                            <!-- If doctor is not logged in, show Sign In link -->
                                            <a href="{{ url('doctor/login') }}"
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
            {{-- <section class="breadcrumb-section">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="breadcrumb-wrapper">
                        <div class="breadcrumb-title-block">
                            <h1 class="breadcumb-title">Edit Doctor</h1>
                            <div class="home-page-back-link-wrap"><a href="{{ url('home') }}"
                                    class="page-link">Home</a>
                                <div class="divider">/</div>
                                <div class="home-page-back-link-wrap"><a href="{{ url('doctor/profile') }}"
                                    class="page-link">Profile</a>
                                <div class="divider">/</div>
                                <div class="page-name">Edit Doctor</div>
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
            </section> --}}

            <div class="edit-profile-page"
                style="background-color: #fbfbfb; padding: 40px 20px; font-family: Arial, sans-serif;">
                <div class="container" style="max-width: 800px; margin: auto;">
                    <form action="{{ route('doctor.profile.update', $doctor->id) }}" method="POST"
                        enctype="multipart/form-data"
                        style="background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);">
                        @csrf
                        @method('PUT') <!-- Spoofing the PUT method -->

                        <!-- Personal Information Section -->
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="name" style="color: #43ba7f;">Name</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $doctor->name) }}" class="form-control"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="email" style="color: #43ba7f;">Email</label>
                            <input type="email" name="email" id="email"
                                value="{{ old('email', $doctor->email) }}" class="form-control"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="phone" style="color: #43ba7f;">Phone</label>
                            <input type="text" name="phone" id="phone"
                                value="{{ old('phone', $doctor->phone) }}" class="form-control"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- About Section -->
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="about" style="color: #43ba7f;">About</label>
                            <textarea name="about" id="about" class="form-control"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
                                placeholder="Write something about yourself">{{ old('about', $user->about ?? '') }}</textarea>
                            @error('about')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Work Experience Section -->
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="work_experience" style="color: #43ba7f;">Work Experience</label>
                            <textarea name="work_experience" id="work_experience" class="form-control"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
                                placeholder="Describe your work experience">{{ old('work_experience', $user->work_experience ?? '') }}</textarea>
                            @error('work_experience')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Experience Years Section -->
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="year_experience" style="color: #43ba7f;">Experience Years</label>
                            <input type="number" name="year_experience" id="year_experience"
                                value="{{ old('year_experience', $user->experience_years ?? '') }}"
                                class="form-control"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
                                placeholder="Enter the number of years of experience">
                            @error('year_experience')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Specialization -->
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="specialization_id" style="color: #43ba7f;">Specialization</label>
                            <select name="specialization_id" id="specialization_id" class="form-control"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                <option value="">Select Specialization</option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}"
                                        {{ old('specialization_id', $doctor->specialization_id) == $specialization->id ? 'selected' : '' }}>
                                        {{ $specialization->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('specialization_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Available Time Section -->
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="available_time" style="color: #43ba7f;">Available Time</label>
                            <input type="text" name="available_time" id="available_time"
                                value="{{ old('available_time', $user->available_time ?? '') }}" class="form-control"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            @error('available_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Additional Information -->
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="experience" style="color: #43ba7f;">Years of Experience</label>
                            <input type="number" name="experience" id="experience"
                                value="{{ old('experience', $doctor->experience) }}" class="form-control"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            @error('experience')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="profile_img" style="color: #43ba7f;">Profile Image</label>
                            <input type="file" name="profile_img" id="profile_img" class="form-control">
                            @error('profile_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Section -->
                        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ccc;">
                            <h4 style="color: #43ba7f;">Change Password</h4>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="current_password" style="color: #43ba7f;">Current Password</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control"
                                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="password" style="color: #43ba7f;">New Password</label>
                                <input type="password" name="password" id="password"
                                    placeholder="Leave blank to keep current" class="form-control"
                                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="password_confirmation" style="color: #43ba7f;">Confirm New
                                    Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control"
                                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </div>
                        </div>

                        <button type="submit"
                            style="background-color: #43ba7f; color: #ffffff; padding: 7px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                            Save Changes
                        </button>
                        <a href="{{ route('doctor.pages.doctors.profile') }}" class="btn btn-secondary"
                            style="background-color: #ccc; padding: 7px; border-radius: 5px; color: #fff;">Cancel</a>
                    </form>
                </div>
            </div>

            <section class="footer-section">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="footer-block-wrapper">
                        <div data-w-id="930cbbf2-e22c-508e-4443-ba9f31767a12" class="footer-content">
                            <div id="w-node-_930cbbf2-e22c-508e-4443-ba9f31767a13-31767a0f" class="footer-block"><a
                                    href="{{ url('home') }}" class="footer-logo-link-block w-inline-block"> <img
                                        src="{{ asset('doc-on-call-logo-modern.svg') }}" loading="lazy"
                                        alt="Logo Image" class="logo" /></a>
                                <div class="footer-address">Revolutionizing healthcare with expert advice and virtual
                                    care
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
                                    <a href="{{ url('doctor/profile') }}" class="footer-link">Profile</a>

                                    <a href="{{ url('doctor/appointments') }}" class="footer-link">Appointments</a><a
                                        href="" aria-current="page" class="footer-link w--current">Reviews</a>
                                </div>
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

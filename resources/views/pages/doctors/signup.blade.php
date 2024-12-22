<!DOCTYPE html>
<!-- This site was created in Webflow. https://webflow.com --><!-- Last Published: Wed May 22 2024 10:44:37 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="medcare-template.webflow.io" data-wf-page="65e6d6f8551b8078d69c5e3c"
    data-wf-site="65c992c37023d69385565acc" lang="en">
<!-- Mirrored from medcare-template.webflow.io/sign-up by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:22 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Sign Up</title>
    <meta content="Sign Up" property="og:title" />
    <meta content="Sign Up" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="../assets-global.website-files.com/65c992c37023d69385565acc/css/medcare-template.webflow.1b5882e1f.css"
        rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>
    <link href="../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9dc31c6aa622c981c7036_favicon_32x32px.png"
        rel="shortcut icon" type="image/x-icon" />
    <link href="../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9dc398a42023d2fd60f43_webclip_256x256px.png"
        rel="apple-touch-icon" />
</head>

<body>
    <div id="Scroll-Top" class="page-wrapper">
        <section class="header-section">
            <div class="w-layout-blockcontainer container w-container">
                <div class="header-nav-block">
                    <div data-animation="over-left" data-collapse="medium" data-duration="400" data-easing="ease"
                        data-easing2="ease" role="banner" class="header-nav-inner-block w-nav">
                        <div class="header-navbar-wrapper"><a href="{{ url('home') }}"
                                class="navbar-logo w-nav-brand"><img
                                    src="{{ asset('cdn.prod.website-files.com/65c992c37023d69385565acc/65c9a4e9f78ae07595c9f519_medcare-logo.png') }}"
                                    loading="lazy" alt="Logo Image" class="logo" /></a>
                            <nav role="navigation" class="nav-menu-wrap w-nav-menu">
                                <div class="nav-menu-list-wrapper">
                                    <ul role="list" class="nav-menu w-list-unstyled">
                                        <li class="mobile-logo-wrap"><a href="{{ url('home') }}"
                                                class="navbar-logo w-nav-brand"><img
                                                    src="{{ asset('cdn.prod.website-files.com/65c992c37023d69385565acc/65c9a4e9f78ae07595c9f519_medcare-logo.png') }}"
                                                    loading="lazy" alt="Logo Image" class="logo" /></a></li>
                                        <li class="menu-list">

                                        </li>
                                        <li class="menu-list"><a href="{{ url('home') }}" aria-current="page"
                                                class="menu-link ">Home</a></li>
                                        <li class="menu-list"><a href="{{ url('about') }}" aria-current="page"
                                                class="menu-link ">About</a></li>
                                        <li class="menu-list"><a href="{{ url('doctors') }}"
                                                class="menu-link">Doctors</a></li>
                                        <li class="menu-list"><a href="{{ url('appointment') }}" aria-current="page"
                                                class="menu-link ">Appointment</a></li>
                                        <li class="menu-list"><a href="{{ url('user/login') }}" aria-current="page"
                                                class="menu-link ">Sign In</a></li>

                                    </ul>
                                    <div class="nav-menu-button-wrapper"><a href="{{ url('contact-us') }}"
                                            class="button-outline w-button">Contact
                                            Us</a></div>
                                </div>
                            </nav>
                            <div class="menu-button w-nav-button">
                                <div class="mobile-menu-icon w-icon-nav-menu"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="main-wrapper">
            <section class="authentication-section position-absolute d-flex">
                <div class="w-layout-blockcontainer container position-absolute w-container">
                    <div class="authentication-form-wrapper">
                        <div class="authentication-content-wrap">
                            <div class="authentication-title-wrap">
                                <h1 class="authentication-title">Create New Account</h1>
                                <div class="authentication-sub-title">Start your journey here</div>
                            </div>
                            <div class="validation-input-form-wrap">
                                <div class="validation-input-form-block w-form">
                                    <form id="wf-form-Password" name="wf-form-Password" data-name="Password"
                                    method="POST" action="{{ route('doctor.signup') }}" class="validation-input-form"
                                        data-wf-page-id="65e6d6f8551b8078d69c5e3c"
                                        data-wf-element-id="2ab8b72a-0c0f-e390-2c77-2b3bb974f363">
                                        @csrf
                                        <div class="validation-name-wrap">
                                            <div class="validation-name-block"><label for="Fast-Name"
                                                    class="validation-input-field-level">First Name</label><input
                                                    class="varidation-form-text-field w-input" maxlength="256"
                                                    id="name" type="text" name="name" placeholder="First name"
                                                    required="" /></div>
                                            
                                        </div><label for="Email-Address" class="validation-input-field-level">Email
                                            Address</label><input class="varidation-form-text-field w-input"
                                            maxlength="256" id="email" type="email" name="email" data-name="Email Address"
                                            placeholder="Enter your email" 
                                            required="" /><label for="Password"
                                            class="validation-input-field-level">Password</label><input
                                            class="varidation-form-text-field w-input" maxlength="256"
                                            id="password" type="password" name="password"  data-name="Password" placeholder="Password"
                                            required="" /><label for="Password"
                                            class="validation-input-field-level">Confirm Password</label><input
                                            class="varidation-form-text-field w-input" maxlength="256"
                                             id="password_confirmation" type="password" name="password_confirmation"  data-name="Password" placeholder="Confirm Password"
                                            required="" />
                                            
                                        <div class="login-condition-block">
                                            <div class="login-conditon-title">Already have an account?</div><a
                                            href="{{route('doctor.login')}}" class="register-link">Login</a>
                                        </div><input type="submit" data-wait="Please wait..."
                                            class="button-primary text-center w-button" value="Create Account" />
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
                </div>
                <div class="authentication-banner"><img
                        src="../cdn.prod.website-files.com/65c992c37023d69385565acc/65e6e12b4f03e2d8440da7a9_authentication%20-banner.jpg"
                        loading="lazy"
                        sizes="(max-width: 767px) 100vw, (max-width: 1279px) 50vw, (max-width: 1919px) 55vw, 950px"
                        srcset="https://assets-global.website-files.com/65c992c37023d69385565acc/65e6e12b4f03e2d8440da7a9_authentication%20-banner-p-500.jpg 500w, https://assets-global.website-files.com/65c992c37023d69385565acc/65e6e12b4f03e2d8440da7a9_authentication%20-banner-p-800.jpg 800w, https://assets-global.website-files.com/65c992c37023d69385565acc/65e6e12b4f03e2d8440da7a9_authentication%20-banner.jpg 950w"
                        alt="Authentication Banner" class="authentication-banner-image" /></div>
            </section>
        </div>
        <section class="footer-section">
            <div class="w-layout-blockcontainer container w-container">
                <div class="footer-block-wrapper">
                    <div data-w-id="930cbbf2-e22c-508e-4443-ba9f31767a12" class="footer-content">
                        <div id="w-node-_930cbbf2-e22c-508e-4443-ba9f31767a13-31767a0f" class="footer-block"><a
                                href="home-page/home-one.html" class="footer-logo-link-block w-inline-block"><img
                                    src="../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9a4e9f78ae07595c9f519_medcare-logo.png"
                                    loading="lazy" alt="Footer Logo" class="logo-image" /></a>
                            <div class="footer-address">Empowering wellness through knowledge and care</div>
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
                            <div class="footer-link-wrapper"><a href="home-page/home-one.html"
                                    class="footer-link">Home</a><a href="about-us.html"
                                    class="footer-link">About</a><a href="blog.html" class="footer-link">Blog</a><a
                                    href="doctors.html" class="footer-link">Doctors</a><a href="contact-us.html"
                                    class="footer-link">Contact</a></div>
                        </div>
                        <div class="footer-block">
                            <div class="footer-title">Utility pages</div>
                            <div class="footer-link-wrapper"><a href="401.html" class="footer-link">Password
                                    Protected</a><a href="404.html" class="footer-link">404 Not Found</a><a
                                    href="template-info/style-guide.html" class="footer-link">Style Guide</a><a
                                    href="template-info/licenses.html" class="footer-link">Licenses</a><a
                                    href="template-info/changelog.html" class="footer-link">Change Log</a></div>
                        </div>
                        <div class="footer-block">
                            <div class="footer-title">Contact</div>
                            <div class="footer-link-wrapper">
                                <div class="footer-contact-text">3891 Ranch view Dr. Richardson, California 62639</div>
                                <a href="mailto:contact@medcare.com" class="footer-link">contact@medcare.com</a><a
                                    href="tel:5055550125" class="footer-link">(505) 555-0125</a>
                            </div>
                        </div>
                        <div class="footer-block">
                            <div class="footer-title">Subscribe Now</div>
                            <div class="footer-link-wrapper">
                                <div class="footer-subscribe-text">Stay informed and inspired with our newsletter</div>
                                <div class="newsletter-input-block-two">
                                    <div class="newsletter-form-block-two w-form">
                                        <form id="email-form" name="email-form" data-name="Email Form"
                                            method="get" class="newsletter-form-two"
                                            data-wf-page-id="65e6d6f8551b8078d69c5e3c"
                                            data-wf-element-id="930cbbf2-e22c-508e-4443-ba9f31767a44"><input
                                                class="newsletter-input-field-two w-input" maxlength="256"
                                                name="Email" data-name="Email" placeholder="Your email"
                                                type="email" id="Email" required="" /><input type="submit"
                                                data-wait="Please wait..." class="subscribe-button w-button"
                                                value="Subscribe" /></form>
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
                    </div>
                    <div data-w-id="930cbbf2-e22c-508e-4443-ba9f31767a4d" class="copy-right-block">
                        <div class="footer-copyright-center">Copyright © <a href="home-page/home-one.html"
                                class="template-link">MedCare </a>| Designed by <a href="https://brandbes.com/"
                                target="_blank" class="brandbes-link">Brandbes </a>- Powered by <a
                                href="https://webflow.com/templates/designers/brandbes" target="_blank"
                                class="webflow-link">Webflow</a></div>
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
<!-- Mirrored from medcare-template.webflow.io/sign-up by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:22 GMT -->

</html>

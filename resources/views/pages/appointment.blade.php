<!DOCTYPE html>
<!-- This site was created in Webflow. https://webflow.com --><!-- Last Published: Wed May 22 2024 10:44:37 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="medcare-template.webflow.io" data-wf-page="65d342a53b5eddb8f8af6cc1"
    data-wf-site="65c992c37023d69385565acc" lang="en">
<!-- Mirrored from medcare-template.webflow.io/appointment by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:21 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Appointment</title>
    <meta content="Appointment" property="og:title" />
    <meta content="Appointment" property="twitter:title" />
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
                  <div class="header-navbar-wrapper"><a href="{{url('home')}}" class="navbar-logo w-nav-brand"><img
                        src="{{asset('cdn.prod.website-files.com/65c992c37023d69385565acc/65c9a4e9f78ae07595c9f519_medcare-logo.png')}}"
                        loading="lazy" alt="Logo Image" class="logo" /></a>
                    <nav role="navigation" class="nav-menu-wrap w-nav-menu">
                      <div class="nav-menu-list-wrapper">
                        <ul role="list" class="nav-menu w-list-unstyled">
                          <li class="mobile-logo-wrap"><a href="{{url('home')}}" class="navbar-logo w-nav-brand"><img
                                src="{{asset('cdn.prod.website-files.com/65c992c37023d69385565acc/65c9a4e9f78ae07595c9f519_medcare-logo.png')}}"
                                loading="lazy" alt="Logo Image" class="logo" /></a></li>
                          <li class="menu-list">
                           
                          </li>
                          <li class="menu-list"><a href="{{url('home')}}" aria-current="page"
                            class="menu-link ">Home</a></li>
                          <li class="menu-list"><a href="{{url('about')}}" aria-current="page"
                              class="menu-link ">About</a></li>
                              <li class="menu-list"><a href="{{url('doctors')}}" class="menu-link ">Doctors</a></li>
                        <li class="menu-list"><a href="{{url('appointment')}}" aria-current="page"
                            class="menu-link w--current">Appointment</a></li>
                          <li class="menu-list"><a href="{{url('user/login')}}" aria-current="page"
                            class="menu-link ">Sign In</a></li>
                            
                        </ul>
                        <div class="nav-menu-button-wrapper"><a href="{{url('contact-us')}}" class="button-outline w-button">Contact
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
            <section class="breadcrumb-section">
                <div class="w-layout-blockcontainer container w-container">
                    <div class="breadcrumb-wrapper">
                        <div class="breadcrumb-title-block">
                            <h1 class="breadcumb-title">Book Appointment</h1>
                            <div class="home-page-back-link-wrap"><a href="{{url('home')}}"
                                    class="page-link">Home</a>
                                <div class="divider">/</div>
                                <div class="page-name"> Book Appointment</div>
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
            <section class="appointment-section section-gap-y-axis-140px">
                <div class="w-layout-blockcontainer container w-container">
                    <div data-w-id="67d38fe2-9c59-88c7-6748-16034114586a" style="opacity:0"
                        class="appointment-wrapper">
                        <div class="appintment-form-wrap">
                            <div class="appointment-form-block w-form">
                                <form id="wf-form-Email-Form" name="wf-form-Email-Form" data-name="Email Form"
                                    method="get" class="appointment-form"
                                    data-wf-page-id="65d342a53b5eddb8f8af6cc1"
                                    data-wf-element-id="c0dca1d7-0585-c59e-04a7-25fd8b96ed5d">
                                    <div class="appointment-input-grid"><input class="appointment-input-field w-input"
                                            maxlength="256" name="name" data-name="Name" placeholder="Your name"
                                            type="text" id="name" required="" /><input
                                            class="appointment-input-field w-input" maxlength="256" name="Number"
                                            data-name="Number" placeholder="Phone number" type="tel"
                                            id="Number" required="" /><input
                                            class="appointment-input-field w-input" maxlength="256" name="Email"
                                            data-name="Email" placeholder="Email address" type="email"
                                            id="Email-2" required="" /><select id="Choose-service"
                                            name="Choose-service" data-name="Choose service"
                                            class="appointment-input-field curso-pointer w-select">
                                            <option value="">Choose service</option>
                                            <option value="First">Cardiologist</option>
                                            <option value="Second">Oncology</option>
                                            <option value="Third">Neurology</option>
                                            <option value="Fourth">Pediatrics</option>
                                            <option value="Five">Gynecology</option>
                                            <option value="Another option">Ophthalmology</option>
                                        </select><input class="appointment-input-field w-input" maxlength="256"
                                            name="Date" data-name="Date" placeholder="dd/mm/yy" type="text"
                                            id="Date" required="" /><select id="Time" name="Time"
                                            data-name="Time" class="appointment-input-field curso-pointer w-select">
                                            <option value="">Select time</option>
                                            <option value="First">08.00 AM</option>
                                            <option value="Second">10.00 AM</option>
                                            <option value="Third">12.00 PM</option>
                                            <option value="Four">04.00 PM</option>
                                            <option value="Five">06.00 PM</option>
                                            <option value="Six">08.00 PM</option>
                                        </select></div><select id="Choose-Doctor" name="Choose-Doctor"
                                        data-name="Choose Doctor"
                                        class="appointment-input-field curso-pointer w-select">
                                        <option value="">Choose Doctor</option>
                                        <option value="First">Dr. Esther Howard</option>
                                        <option value="Second">Dr. Cameron Williams</option>
                                        <option value="Third">Dr. Leslie Alexander</option>
                                        <option value="Fourth">Dr. Marks Stilleng</option>
                                        <option value="Five">Dr. Broklyn Simon</option>
                                        <option value="Six">Dr. Jessica White</option>
                                        <option value="Seven">Dr. Sarah Davis</option>
                                        <option value="Nine">Dr. Robert Jackson</option>
                                        <option value="Ten">Dr. David Martin</option>
                                    </select>
                                    <textarea placeholder="Write your message..." maxlength="5000" id="field" name="field" data-name="Field"
                                        class="appointment-text-aria w-input"></textarea><input type="submit" data-wait="Please wait..."
                                        class="button-primary large w-button" value="Book Appointment" />
                                </form>
                                <div class="w-form-done">
                                    <div>Thank you! Your submission has been received!</div>
                                </div>
                                <div class="w-form-fail">
                                    <div>Oops! Something went wrong while submitting the form.</div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="appointment-content-info">
                            <h2 class="section-title-appointment appointment">Book an Appointment</h2>
                            <p class="appointment-description">You can benefit from an expert medical consultation -
                                schedule an appointment now.</p>
                            <ul role="list" class="appointment-item-list-wrap">
                                <li class="appointment-list-item">200+ Doctor Always Available</li>
                                <li class="appointment-list-item">Free Appointment With Any Specialty</li>
                                <li class="appointment-list-item">Virtual On-Site</li>
                            </ul>
                            <h3 class="help-title margin-top-60px">Need Some Help? <span
                                    class="help-title-span">Contact Us Today</span></h3>
                            <div class="authority-contact-wrap">
                                <div class="authority-contact-block">
                                    <div class="authority-icon-wrap phone"><img
                                            src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65d46bdd61a0aa9412a2f4db_phone-white.svg"
                                            loading="lazy" alt="Phone Call" class="contact-item-icon" /></div>
                                    <div class="author-contact-link-wrap"><a href="tel:+5055550125"
                                            class="author-contact-link">(505) 555-0125</a><a href="tel:+3165550116"
                                            class="author-contact-link">(316) 555-0116</a></div>
                                </div>
                                <div class="authority-contact-block">
                                    <div class="authority-icon-wrap email"><img
                                            src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65d46d515f57bc0fdbb72064_email-white.svg"
                                            loading="lazy" alt="Phone Call" class="contact-item-icon" /></div>
                                    <div class="author-contact-link-wrap"><a
                                            href="mailto:contact@medcare.com?subject=Email"
                                            class="author-contact-link">DocOnCall@gmail.com</a></div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </section>
        </div>
        <section class="footer-section">
            <div class="w-layout-blockcontainer container w-container">
                <div class="footer-block-wrapper">
                    <div data-w-id="930cbbf2-e22c-508e-4443-ba9f31767a12" class="footer-content">
                        <div id="w-node-_930cbbf2-e22c-508e-4443-ba9f31767a13-31767a0f" class="footer-block"><a
                                href="{{url('home')}}" class="footer-logo-link-block w-inline-block"><img
                                    src="../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9a4e9f78ae07595c9f519_medcare-logo.png"
                                    loading="lazy" alt="Footer Logo" class="logo-image" /></a>
                            <div class="footer-address">Revolutionizing healthcare with expert advice and virtual care</div>
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
                            <div class="footer-link-wrapper"><a href="{{url('home')}}"
                                    class="footer-link">Home</a><a href="{{url('about')}}"
                                    class="footer-link">About</a><a href="{{url('appointment')}}" class="footer-link">Appointment</a><a
                                    href="{{url('doctors')}}" class="footer-link">Doctors</a><a href="{{url('contact-us')}}"
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
                        <div class="footer-copyright-center">Copyright © <a href="{{url('home')}}"
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
<!-- Mirrored from medcare-template.webflow.io/appointment by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:21 GMT -->

</html>

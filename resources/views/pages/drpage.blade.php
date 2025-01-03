<!DOCTYPE html>
<!-- This site was created in Webflow. https://webflow.com --><!-- Last Published: Wed May 22 2024 10:44:37 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="medcare-template.webflow.io" data-wf-page="65cc8858f99292c62ad3c85f"
    data-wf-site="65c992c37023d69385565acc" lang="en" data-wf-collection="65cc8857f99292c62ad3c82a"
    data-wf-item-slug="dr-broklyn-simon">
<!-- Mirrored from medcare-template.webflow.io/doctors/dr-broklyn-simon by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:31 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Dr. Broklyn Simon</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link
        href="../../assets-global.website-files.com/65c992c37023d69385565acc/css/medcare-template.webflow.1b5882e1f.css"
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="{{ asset('doc_on_call_logo_icon.png') }}"
        rel="shortcut icon"  />
    <link
        href="../../cdn.prod.website-files.com/65c992c37023d69385565acc/65c9dc398a42023d2fd60f43_webclip_256x256px.png"
        rel="apple-touch-icon" />
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <style>.pagination-wrap {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .pagination .page-link {
            color: #43ba7f; /* Primary color */
            border: 1px solid #43ba7f; /* Border color */
            padding: 8px 12px;
            margin: 0 5px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .pagination .page-link:hover {
            background-color: #43ba7f; /* Hover background color */
            color: #ffffff; /* Hover text color */
        }
        
        .pagination .page-item.active .page-link {
            background-color: #238f5a; /* Primary color two */
            border-color: #238f5a;
            color: #ffffff; /* White text */
        }
        </style>
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

        <body>
            <div id="Scroll-Top" class="page-wrapper">
                <main class="main-wrapper">
                    <section data-w-id="67dd1763-a445-3690-d352-6296192bf90b" class="breadcrumb-section">
                        <div class="w-layout-blockcontainer container w-container">
                            <div class="breadcrumb-wrapper">
                                <div class="breadcrumb-title-block">
                                    <h1 class="breadcumb-title">Doctor's Details</h1>
                                    <div class="home-page-back-link-wrap"><a href="{{ url('home') }}"
                                            class="page-link">Home</a>
                                        <div class="divider">/</div><a href="{{ url('doctors') }}"
                                            class="page-link">Doctors</a>
                                        <div class="divider">/</div>
                                        <div class="page-name">Doctor's Details</div>
                                    </div>
                                </div>
                                <div class="breadcrumb-shape-block">
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
                    <section class="doctor-detail-section padding-top-140px padding-bottom-120px">
                        <div class="w-layout-blockcontainer container w-container">
                            <div class="doctor-details-wrapper">
                                <div class="doctor-profile-block">
                                    <div class="doctor-thumbnail-image-wrap">
                                        <img src="{{ asset('storage/' . $doctor->profile_img) }}" alt="Doctor Image"
                                            class="doctor-thumbnail-image" />
                                    </div>
                                    <div class="doctor-details-info">
                                        <div class="doctor-thumbnail-name-wrap">
                                            <div class="thumbnail-doctor-name">{{ $doctor->name }}</div>
                                            <div class="thumbnail-doctor-designation">
                                                {{ $doctor->specialization->name }}</div>
                                        </div>

                                    </div>
                                    <div class="doctor-quality-block">
                                        <div class="doctor-exprience-wrap">
                                            <div class="exprience-year">{{ $doctor->year_experience }}<span
                                                    class="primary-color-span">+</span></div>
                                            <div class="quality-title">Years experience</div>
                                        </div>
                                        <div class="doctor-review-wrap">
                                            <div class="dr-review">{{ $doctor->rating }}<span
                                                    class="primary-color-span">+</span></div>
                                            <div class="quality-title">Positive review</div>
                                        </div>
                                    </div>
                                    <div class="doctor-thumbnail-border"></div>
                                    <div class="available-time-block">
                                        <div class="available-time-title">Available Times</div>
                                        <div class="doctor-avaiable-time-chart w-richtext">
                                            @foreach($doctor->availability as $availability)
                                                <p><strong>{{ $availability->day_of_week }}:</strong> {{ $availability->start_time }} - {{ $availability->end_time }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <div class="doctor-thumbnail-border"></div>
                                    <div class="doctor-contact-block">
                                        <div class="doctor-contact-title">Contact info</div>
                                        <div class="doctor-contact-link-wrap">
                                            <div class="contact-icon-block">
                                              <i class="fa-solid fa-phone" style="color:#43ba7f"></i>
                                            </div>
                                            <a href="tel:{{ $doctor->phone }}"
                                                class="doctor-contact-link">{{ $doctor->phone }}</a>
                                        </div>
                                        <div class="doctor-contact-link-wrap">
                                            <div class="contact-icon-block">
                                              <i class="fa-solid fa-envelope" style="color:#43ba7f"></i>
                                            </div>
                                            <a href="mailto:{{ $doctor->email }}"
                                                class="doctor-contact-link">{{ $doctor->email }}</a>
                                        </div>
                                    </div>
                                    <div class="dr-appointment-button-wrap">
                                        <a href="{{ url('appointments/book/' . $doctor->id) }}"
                                            class="button-primary dr-appointment w-inline-block">
                                            <div class="button-primary-text">Book Appointment 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" style="margin-left: 48px; ">
                                            <path
                                                d="M16.9998 11.9922C17.0007 12.1567 16.9692 12.3198 16.907 12.472C16.8448 12.6243 16.7532 12.7628 16.6373 12.8796L9.1384 20.3785C8.90306 20.6139 8.58386 20.7461 8.25103 20.7461C7.9182 20.7461 7.599 20.6139 7.36366 20.3785C7.12831 20.1432 6.99609 19.824 6.99609 19.4912C6.99609 19.1583 7.12831 18.8391 7.36366 18.6038L13.9877 11.9922L7.37615 5.38068C7.1714 5.14158 7.06441 4.83403 7.07656 4.51948C7.08871 4.20494 7.2191 3.90655 7.44169 3.68397C7.66428 3.46138 7.96266 3.33098 8.27721 3.31883C8.59176 3.30668 8.89931 3.41368 9.1384 3.61843L16.6373 11.1174C16.8682 11.3501 16.9984 11.6644 16.9998 11.9922Z"
                                                fill="currentcolor" />
                                        </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="doctor-details-block">
                                    <div class="doctor-details-rich-text-wrap w-richtext">
                                        <h2>About Dr. {{ $doctor->name }}</h2>
                                        <p>{{ $doctor->about }}</p>
                                        <h2>Work Experience</h2>
                                        <p>{{ $doctor->work_experience }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Doctor Details Section -->
<section class="doctor-detail-section">
  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  @if (session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
  @endif

  <div class="w-container">
      <!-- Doctor Info and other details here -->

      <!-- Review Form -->
      <div class="review-form">
          <h3>Write a Review</h3>
          <form action="{{ route('reviews.store', $doctor->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="rating">Rating</label>
                <div class="star-rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                    <input type="hidden" name="rating" id="rating" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" rows="4" placeholder="Write your review here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
        
        
      </div>

      <!-- Display Existing Reviews -->
      <div class="doctor-reviews">
        <h3>Reviews</h3>
        @if ($reviews->count() > 0)
            @foreach ($reviews as $review)
                <div class="review d-flex justify-content-between align-items-center" id="review-{{ $review->id }}">
                    <!-- Left Section: Review Content -->
                    <div class="review-content">
                        <div class="review-header">
                            <div class="author-profile">
                                <img src="{{ asset($review->user->profile_img ? $review->user->profile_img : 'default-profile.jpg') }}" alt="User Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                <span class="author-name">{{ $review->user->name }}</span>
                                <div class="author-details">
                                    <span class="review-date">{{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-rating">
                            @for ($i = 0; $i < $review->rating; $i++)
                                <span class="star">★</span>
                            @endfor
                        </div>
                        <p class="review-text" id="review-text-{{ $review->id }}">{{ $review->comment }}</p>
                    </div>
    
                    <!-- Right Section: Edit and Delete Buttons -->
                    @if (auth()->check() && $review->user_id == auth()->id())
                        <div class="review-actions text-right">
                            <button class="btn btn-sm btn-primary" onclick="editReview({{ $review->id }})">Edit</button>
                            <form action="{{ route('reviews.delete', $review->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $review->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteReview({{ $review->id }})">Delete</button>
                            </form>
                            
                        </div>
                    @endif
                </div>
    
                <!-- Inline Edit Form -->
                <div class="edit-review-form" id="edit-form-{{ $review->id }}" style="display: none; margin-top: 15px;">
                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="rating-{{ $review->id }}">Rating</label>
                            <div class="star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $review->rating ? 'active' : '' }}" data-value="{{ $i }}" onclick="setRating({{ $review->id }}, {{ $i }})">&#9733;</span>
                                @endfor
                                <input type="hidden" name="rating" id="rating-{{ $review->id }}" value="{{ $review->rating }}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="comment-{{ $review->id }}">Comment</label>
                            <textarea name="comment" id="comment-{{ $review->id }}" rows="4" class="form-control" placeholder="Write your review here...">{{ $review->comment }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="cancelEdit({{ $review->id }})">Cancel</button>
                    </form>
                </div>
            @endforeach
            <div class="pagination-wrap">
                {{ $reviews->links('pagination::bootstrap-4') }}
            </div>
        @else
            <p>No reviews available for this doctor.</p>
        @endif
    </div>
    
    
    
    
    
    
  </div>
</section>


                   
                   
                </main>
                <section class="footer-section">
                    <div class="w-layout-blockcontainer container w-container">
                        <div class="footer-block-wrapper">
                            <div data-w-id="930cbbf2-e22c-508e-4443-ba9f31767a12" class="footer-content">
                                <div id="w-node-_930cbbf2-e22c-508e-4443-ba9f31767a13-31767a0f" class="footer-block">
                                    <a href="{{ url('home') }}" class="footer-logo-link-block w-inline-block"> <img src="{{ asset('doc-on-call-logo-modern.svg') }}" loading="lazy" alt="Logo Image" class="logo" /></a>
                                    <div class="footer-address">Revolutionizing healthcare with expert advice and
                                        virtual care</div>
                                    <div class="social-block"><a href="https://www.facebook.com/" target="_blank"
                                            class="footer-social-link w-inline-block"><img
                                                src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caef5f57fd0cc188939b25_facebook.svg"
                                                loading="lazy" alt="Facebook Icon" class="social-image" /><img
                                                src="https://cdn.prod.website-files.com/65c992c37023d69385565acc/65caf2bd6ac28d88edb0269b_facebook-white.svg"
                                                loading="lazy" alt="Facebook Icon"
                                                class="social-image-white" /></a><a href="https://twitter.com/"
                                            target="_blank" class="footer-social-link w-inline-block"><img
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
                                                loading="lazy" alt="Instragram" class="social-image-white" /></a>
                                    </div>
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
                                        <a href="mailto:contact@medcare.com"
                                            class="footer-link">DocOnCall@gmail.com</a><a href="tel:5055550125"
                                            class="footer-link">(505) 555-0125</a>
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
    <script src="../../d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c843fc.js?site=65c992c37023d69385565acc"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script src="../../assets-global.website-files.com/65c992c37023d69385565acc/js/webflow.e72dc5e5f.js"
        type="text/javascript"></script>
</body>
<!-- Mirrored from medcare-template.webflow.io/doctors/dr-broklyn-simon by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2024 13:37:31 GMT -->
<script>
 // Add event listener to the stars
document.querySelectorAll('.star').forEach(star => {
    star.addEventListener('click', function () {
        const rating = this.getAttribute('data-value');
        
        // Set the hidden input to the selected rating value
        document.getElementById('rating').value = rating;

        // Add 'selected' class to all stars up to the clicked one
        document.querySelectorAll('.star').forEach(star => {
            star.classList.remove('selected'); // Remove selected class from all stars
        });

        // Add 'selected' class to the clicked star and all previous stars
        for (let i = 0; i < rating; i++) {
            document.querySelectorAll('.star')[i].classList.add('selected');
        }
    });
});

// Optional: Add hover effect to display rating preview
document.querySelectorAll('.star').forEach(star => {
    star.addEventListener('mouseover', function () {
        const rating = this.getAttribute('data-value');

        document.querySelectorAll('.star').forEach(star => {
            star.classList.remove('selected');
        });

        for (let i = 0; i < rating; i++) {
            document.querySelectorAll('.star')[i].classList.add('selected');
        }
    });

    // Reset the stars on mouseout
    star.addEventListener('mouseout', function () {
        document.querySelectorAll('.star').forEach(star => {
            star.classList.remove('selected');
        });
    });
});

function editReview(reviewId) {
    // Hide the review text and show the edit form
    document.getElementById(`review-text-${reviewId}`).style.display = 'none';
    document.getElementById(`edit-form-${reviewId}`).style.display = 'block';
}

function cancelEdit(reviewId) {
    // Show the review text and hide the edit form
    document.getElementById(`review-text-${reviewId}`).style.display = 'block';
    document.getElementById(`edit-form-${reviewId}`).style.display = 'none';
}
function deleteReview(reviewId) {
    // SweetAlert confirmation popup
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            // If user confirms, submit the hidden delete form
            document.getElementById(`delete-form-${reviewId}`).submit();

            
        }
    });
}


</script>
</html>

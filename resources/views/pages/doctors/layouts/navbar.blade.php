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
                                <img src="{{ asset('doc-on-call-logo-modern.svg') }}"
                                    loading="lazy" alt="Logo Image" class="logo" />
                            </a>

                            <nav role="navigation" class="nav-menu-wrap w-nav-menu">
                                <div class="nav-menu-list-wrapper" style="display: flex; justify-content: space-between; width: 100%;">
                                    <ul role="list" class="nav-menu w-list-unstyled" style="display: flex; align-items: center;">
                                        <li class="mobile-logo-wrap">
                                            <a href="{{ url('home') }}" class="navbar-logo w-nav-brand">
                                                <img src="{{ asset('doc-on-call-logo-modern.svg') }}" loading="lazy" alt="Logo Image" class="logo" />
                                            </a>
                                        </li>
                                        <li class="menu-list">
                                            <a href="{{ url('home') }}" class="menu-link">Home</a>
                                        </li>
                                        <li class="menu-list"><a href="{{ url('doctor/appointments') }}" class="menu-link">Appointments</a></li>
                                        <li class="menu-list"><a href="{{ url('doctor/profile') }}" class="menu-link">Profile</a></li>
                                        
                                        
                                    </ul>
                            
                                    <div class="nav-menu-button-wrapper" style="display: flex; align-items: center;">
                                        @if(auth()->guard('doctor')->check())
                                        <form action="{{ route('doctor.logout') }}" method="POST">
                                        @csrf
                                        <button  class="button-outline w-button menu-list" style="color: red; border:1px solid red">Logout</button>
                                    </form>
                                           
                                        @else
                                            <!-- If doctor is not logged in, show Sign In link -->
                                            <a href="{{ url('doctor/login') }}" class="button-outline w-button menu-list">Sign In</a>
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
                            <h1 class="breadcumb-title">@yield('breadcrumb')</h1>
                            <div class="home-page-back-link-wrap"><a href="{{ url('home') }}"
                                    class="page-link">Home</a>
                                <div class="divider">/</div>
                                <div class="page-name">@yield('breadcrumb')</div>
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
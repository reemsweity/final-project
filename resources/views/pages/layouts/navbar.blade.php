<section class="header-section">
  <div class="w-layout-blockcontainer container w-container">
    <div class="header-nav-block">
      <div data-animation="over-left" data-collapse="medium" data-duration="400" data-easing="ease"
        data-easing2="ease" role="banner" class="header-nav-inner-block w-nav">
        <div class="header-navbar-wrapper">
          <!-- Logo -->
          <a href="{{url('home')}}" class="navbar-logo w-nav-brand">
            <img src="{{asset('doc-on-call-logo-modern.svg')}}" 
                 loading="lazy" alt="Logo Image" class="logo" />
          </a>

          <nav role="navigation" class="nav-menu-wrap w-nav-menu">
            <div class="nav-menu-list-wrapper">
              <ul role="list" class="nav-menu w-list-unstyled">
                <li class="mobile-logo-wrap">
                  <a href="{{url('home')}}" class="navbar-logo w-nav-brand">
                    <img src="{{ asset('doc-on-call-logo-modern.svg') }}" 
                         loading="lazy" alt="Logo Image" class="logo" />
                  </a>
                </li>
                <li class="menu-list"><a href="{{url('home')}}" class="menu-link">Home</a></li>
                <li class="menu-list"><a href="{{url('about')}}" class="menu-link">About</a></li>
                <li class="menu-list"><a href="{{url('doctors')}}" class="menu-link">Doctors</a></li>
                {{-- <li class="menu-list"><a href="{{url('appointment')}}" class="menu-link">Appointment</a></li> --}}
                <li class="menu-list"> <a href="{{url('contact-us')}}" class="menu-link">Contact Us</a></li>
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
              </ul>
                
            

              <div class="nav-menu-button-wrapper">
            
                <!-- Conditional Authentication Links -->
                @if(Auth::check()) 
                  <!-- Profile Dropdown -->
                  
                  <a href="#" class="menu-link dropdown-toggle menu-list dropdown"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ Auth::user()->profile_img ? asset(Auth::user()->profile_img) : asset('default-profile.jpg') }}"
                       alt="Profile Image"
                       style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;" />
                  {{ Auth::user()->name }}
               </a>
               
                    <ul class="dropdown-menu" style="background-color: #ffffff; border-radius: 5px; padding: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                      <li><a href="{{ route('profile') }}" class="dropdown-item" >Profile</a></li>
                      <li>
                        <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                          @csrf
                          <button type="submit" class="dropdown-item" style="color: #e74c3c; border: none; background: none; cursor: pointer;">Logout</button>
                        </form>
                      </li>
                    </ul>
                  
                @else
                  <!-- Sign In Link -->
                  <a href="{{url('user/login')}}" class="button-outline w-button menu-list">Sign In</a>
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

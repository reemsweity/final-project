<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
   
        <div class="sidebar-brand-icon ">
            <a href="{{ route('admin.reports') }}" class="navbar-logo w-nav-brand">
                <img src="{{ asset('doc-on-call-logo-modern.svg') }}" loading="lazy" alt="Logo Image" class="logo" />
            </a>
            
            
        </div>
        
   

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item {{ Request::routeIs('admin.reports') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.reports') }}">
            <i class="fas fa-chart-line"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Nav Item - Users -->
    <li class="nav-item {{ Request::routeIs('admin.users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- Nav Item - Doctors -->
    <li class="nav-item {{ Request::routeIs('admin.doctors') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.doctors') }}">
            <i class="fas fa-user-md"></i>
            <span>Doctors</span>
        </a>
    </li>

    <!-- Nav Item - Reviews -->
    <li class="nav-item {{ Request::routeIs('admin.reviews') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.reviews') }}">
            <i class="fas fa-star"></i>
            <span>Reviews</span>
        </a>
    </li>

    <!-- Nav Item - Payments -->
    <li class="nav-item {{ Request::routeIs('admin.payments') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.payments') }}">
            <i class="fas fa-wallet"></i>
            <span>Payments</span>
        </a>
    </li>

    <!-- Nav Item - Appointments -->
    <li class="nav-item {{ Request::routeIs('admin.appointments') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.appointments') }}">
            <i class="fas fa-calendar-check"></i>
            <span>Appointments</span>
        </a>
    </li>

    <!-- Nav Item - Specialization -->
    <li class="nav-item {{ Request::routeIs('admin.specializations') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.specializations') }}">
            <i class="fas fa-cogs"></i>
            <span>Specialization</span>
        </a>
    </li>

    <!-- Nav Item - Contact-Message -->
    <li class="nav-item {{ Request::routeIs('admin.contacts') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.contacts') }}">
            <i class="fas fa-envelope"></i>
            <span>Contact-Message</span>
        </a>
    </li>

    <!-- Nav Item - Consultations -->
    {{-- <li class="nav-item {{ Request::routeIs('admin.consultations') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.consultations') }}">
            <i class="fas fa-stethoscope"></i>
            <span>Consultations</span>
        </a>
    </li> --}}

    <!-- Nav Item - Testimonials -->
    <li class="nav-item {{ Request::routeIs('admin.testimonials') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.testimonials') }}">
            <i class="fas fa-quote-left"></i>
            <span>Testimonials</span>
        </a>
    </li>
</ul>

<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main {{ auth()->guard('account')->user()->roles }}</li>

                <li>
                    <a href="{{ route('admin.dashboards.index') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-email-outline"></i>
                        <span>Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.users.index') }}">User/Staff</a></li>
                        <li><a href="{{ route('admin.bookings.index') }}">Booking</a></li>
                        <li><a href="{{ route('admin.rooms.index') }}">Room</a></li>
                    </ul>
                </li>
                
                @if (auth()->guard('account')->user()->roles == 'admin')
                <li>
                    <a href="{{ route('admin.permissions.index') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Permission</span>
                    </a>
                </li>
                @endif
               
                <li class="menu-title">Extras</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-box"></i>
                        <span> Authentication </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-login.html">Login</a></li>
                        <li><a href="pages-register.html">Register</a></li>
                        <li><a href="pages-recoverpw.html">Recover Password</a></li>
                        <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
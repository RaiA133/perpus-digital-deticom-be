<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

        <div class="row justify-content-center align-items-center">
            <div class="col-xl-11 d-flex align-items-center justify-content-between">
                <h1 class="logo pl-3">
                  <a href="/" style="text-decoration: none">
                    MY PERPUS
                  </a>
                </h1>
                <nav id="navbar" class="navbar">
                    <ul>
                        @auth
                        @if (in_array(auth()->user()->role_id, [1, 2]))
                        <li><a class="nav-link scrollto" href="/admin/user">Admin</a></li>
                        @endif
                        @endauth
                        <li><a class="nav-link scrollto {{ '/' ==request()->path()? 'active' :''}}" href="/">Home</a>
                        </li>
                        <li><a class="nav-link scrollto {{ 'perpus' ==request()->path()? 'active' :''}}"
                                href="/#about">About Us</a></li>
                        <li>
                        <li><a class="nav-link scrollto {{ 'perpus' ==request()->path()? 'active' :''}}"
                                href="/perpus">Perpustakaan</a></li>
                        <li>
                            @guest
                            @if (Route::has('login'))
                            <a class="nav-link scrollto {{ 'profile' ==request()->path()? 'active' :''}}"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                            @else
                        <li class="nav-item dropdown pe-3 pl-3">
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                                data-bs-toggle="dropdown">
                                <span>{{ Str::limit($user->username, 6) }}</span><i class="bi bi-chevron-down"></i>
                            </a><!-- End Profile Iamge Icon -->
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <img src="{{ asset('storage/img/' . $user->img ) }}"
                                        style="width: 40px; height:40px; object-fit:cover " alt="Profile"
                                        class="rounded-circle">
                                    <h6>{{ $user->username }}</h6>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-start" href="/profile">
                                        <span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/account">
                                        <span>Account Settings</span>
                                    </a>
                                </li>
                                @auth
                                @if (in_array(auth()->user()->role_id, [1, 2, 3]))
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/uploads">
                                        <span>Uploads</span>
                                    </a>
                                </li>
                                @endif
                                @endauth
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/logout">
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul><!-- End Profile Dropdown Items -->
                        </li><!-- End Profile Nav -->
                        @endguest
                        </li>
                        {{-- <li><a href="/logout">logout</a></li> --}}
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </div>
    </div>
</header><!-- End Header -->

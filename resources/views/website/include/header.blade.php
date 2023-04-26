<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('site.index') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/final.png" alt=""> -->
            <h1><img src="{{ asset('website/assets/img/LOGOS.png') }}" alt="DDCS" class="dark-logo" ></h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('site.index') }}" class="@yield('activeHome')">Home</a></li>
                <li><a href="{{ route('site.about') }}" class="@yield('activeAbout')">About</a></li>
                <li><a href="{{ route('site.service') }}" class="@yield('activeService')">Services</a></li>
                <li><a href="{{ route('site.project') }}" class="@yield('activeProject')">Projects</a></li>
                <li><a href="{{ route('site.contact') }}" class="@yield('activeContact')">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<nav data-aos="fade-down" class="navbar navbar-expand-lg pt-4">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="text-center primary-text fs-4 fw-bold text-uppercase border-bottom">Tech<b class="text_color_indigo">News</b></i>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-2">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark fw-semibold @if ($page == 'Home') active @endif" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark fw-semibold" href="#">Software</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark fw-semibold" href="#">Apps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark fw-semibold @if ($page == 'Questions') active @endif" href="{{route('questions')}}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark fw-semibold @if ($page == 'About') active @endif" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark fw-semibold @if ($page == 'Contact') active @endif" href="{{route('contact')}}">Contact</a>
                </li>
            </ul>
            <div class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @if (Route::has('login'))

                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}"
                                    class="nav-link text-uppercase fw-semibold text_color_indigo">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}"class="nav-link text-uppercase fw-semibold text_color_indigo">Log
                                    in</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}"
                                        class="nav-link text-uppercase fw-semibold text_color_indigo">Register</a>
                                </li>
                            @endif
                        @endauth

                    @endif



                    {{-- <li class="nav-item">
                        <span class="nav-link fs-5"><i class="bi bi-search"></i></span>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</nav>

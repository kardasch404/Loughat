<header>
    <nav class="navbar navbar-expand-xl navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('dist/images/logo/logo.png') }}" alt="Logo" class="img-fluid" />
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/courses') }}">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    <a href="{{ url('/signin') }}" class="button button--text">Sign in</a>
                    <a href="{{ url('/signup') }}" class="button button--dark">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
</header>
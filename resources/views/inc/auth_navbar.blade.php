<nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid ps-2 pe-0">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('home') }}">
        Wappa Store
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link me-2" href="{{ route('dashboard') }}">
                <i class="fa fa-user opacity-6 text-dark me-1"></i>
                Dashboard
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link me-2" href="{{ route('shop') }}">
                <i class="fa fa-user opacity-6 text-dark me-1"></i>
                Shop
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center me-2" aria-current="page" href="{{ route('about') }}">
                <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                About Us
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center me-2" aria-current="page" href="{{ route('contact') }}">
                <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                Contact Us
                </a>
            </li>
            @if (!Auth::check())
            <li class="nav-item">
                <a class="nav-link me-2" href="{{ route('login') }}">
                <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                Login
                </a>
            </li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link me-2 active" href="{{ route('register') }}">
                <i class="fas fa-key opacity-6 text-dark me-1"></i>
                {{ __('Register') }}
                </a>
            </li>
            @endif
        </ul>
    </div>
    </div>
</nav>
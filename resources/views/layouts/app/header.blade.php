<nav class="navbar navbar-expand-lg navbar-custom shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">Blog Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a class="nav-link active fw-semibold fs-5" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold fs-5" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold fs-5" href="#">Contact</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                @if(!Auth::check())
                <a href="{{ url('login') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
                <a href="{{ url('register') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                    <i class="fas fa-user-plus"></i> Register
                </a>
                @else
                <a href="{{ url('logout') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                @endif
            </div>
        </div>
    </div>
</nav>
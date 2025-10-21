<nav class="navbar navbar-expand-lg navbar-light bg-body shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-semibold" href="{{ route('home') }}">
      <img src="{{ asset('favicon.ico') }}" alt="Star PT Logo" width="20%">
      Star PT
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('privacy') ? 'active' : '' }}" href="{{ route('privacy') }}">Privacy Policy</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('terms-conditions') ? 'active' : '' }}" href="{{ route('terms') }}">Terms & Conditions</a></li>
      </ul>
    </div>
  </div>
</nav>

<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
          <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
          <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
        </a>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('images/default-avatar.jpg') }}" class="user-image rounded-circle shadow" alt="User Image">
          <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <li class="user-header text-bg-secondary">
            <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('images/default-avatar.jpg') }}" class="rounded-circle shadow" alt="User Image">
            <p>{{ auth()->user()->name }}</p>
          </li>
          <li class="user-footer">
            <a href="#" class="btn btn-outline-danger float-end" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              <button type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
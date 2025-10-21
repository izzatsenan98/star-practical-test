<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('favicon.ico') }}" alt="Star PT Logo" class="brand-image">
      <span class="brand-text">Star PT</span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.consents.index') }}" class="nav-link {{ request()->is('admin/consents*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file"></i>
            <p>Consent</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
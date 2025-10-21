@php
  use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/noto-sans@5.2.6/400.min.css" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('dist/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/plugins/overlayscrollbars/css/overlayscrollbars.min.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600&display=swap" rel="stylesheet">


  <!-- Datatable -->
  <link rel="stylesheet" href="{{ asset('dist/plugins/datatable/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/plugins/datatable-buttons/css/buttons.bootstrap5.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('dist/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/select2/select2-bootstrap-5-theme.min.css') }}">

  <!-- ApexCharts -->
  <link rel="stylesheet" href="{{ asset('dist/plugins/apexcharts/apexcharts.css') }}">

  <!-- Alpine JS -->
  <script defer src="{{ asset('dist/alpinejs/cdn.min.js') }}"></script>
  @include('layouts.styles.style')
  @stack('css')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  @if (! Auth::check())
    @yield('main')
  @else
    <div class="app-wrapper">
      @yield('navbar')
      @yield('sidebar')
      <main class="app-main">
        @yield('main')
      </main>
      @yield('footer')
    </div>
  @endif

  <script src="{{ asset('dist/jquery/jquery-3.7.1.js') }}"></script>

  <!-- jQuery validation -->
  <script src="{{ asset('dist/jquery/validation/jquery.validate.min.js') }}"></script>

  <script src="{{ asset('dist/plugins/datatable/dataTables.js') }}"></script>
  <script src="{{ asset('dist/plugins/datatable/dataTables.bootstrap5.js') }}"></script>

  <!-- Datatable buttons -->
  <script src="{{ asset('dist/plugins/jszip/jszip.min.js') }}"></script>
  {{-- <script src="{{ asset('dist/plugins/pdfmake/pdfmake.min.js') }}"></script> --}}
  <script src="{{ asset('dist/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('dist/plugins/datatable-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('dist/plugins/datatable-buttons/js/buttons.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('dist/plugins/datatable-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('dist/plugins/datatable-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('dist/plugins/datatable-buttons/js/buttons.colVis.min.js') }}"></script>

  <script src="{{ asset('dist/plugins/overlayscrollbars/js/overlayscrollbars.browser.es6.min.js') }}"></script>
  <script src="{{ asset('dist/plugins/popperjs/popper.min.js') }}"></script>
  <script src="{{ asset('dist/plugins/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>

  <!-- Select2 -->
  <script src="{{ asset('dist/select2/select2.min.js') }}"></script>

  <!-- ApexCharts -->
  <script src="{{ asset('dist/plugins/apexcharts/apexcharts.min.js') }}"></script>

  <!-- Bootbox -->
  <script src="{{ asset('dist/bootbox/bootbox.js') }}"></script>

  <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
      scrollbarTheme: "os-theme-light",
      scrollbarAutoHide: "leave",
      scrollbarClickScroll: true,
    };
    document.addEventListener("DOMContentLoaded", function() {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      if (
        sidebarWrapper &&
        typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
      ) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script>
  <script src="{{ asset('dist/plugins/sortablejs/Sortable.min.js') }}"></script>

  @stack('js')
</body>

</html>
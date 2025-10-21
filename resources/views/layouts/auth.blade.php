@extends('layouts.base')

@section('navbar')
  @include('layouts.partials.navbar')  
@endsection

@section('sidebar')
  @include('layouts.partials.sidebar')  
@endsection

@section('main')
  <div class="app-content-header">
    <div class="container-fluid">
      <div id="pageLoadBar" class="progress progress-bar-on-top">
        <div id="pageLoadProgress" class="progress-bar bg-pks-primary width-0 t-width-0"></div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <h5 class="mb-0">
            @yield('title')
          </h5>
        </div>
        {{-- <div class="col-sm-6">
          <!-- Breadcrumb -->
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </div> --}}
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      @include('layouts.partials.notification')
      @yield('content')
    </div>
  </div>
@endsection

@section('footer')
  @include('layouts.partials.footer')
@endsection

@push('js')
<script>
  $(document).ready(function () {
    let width = 0;
    let progressInterval = setInterval(function () {
      width += 2;
      $('#pageLoadProgress').css('width', width + '%');

      if (width >= 99) {
        clearInterval(progressInterval);
      }
    }, 5);
  });

  $(window).on('load', function () {
    $('#pageLoadProgress').css('width', '100%');
    setTimeout(function () {
      $('#pageLoadBar').fadeOut('slow');
    }, 300);
  });
</script>
@endpush
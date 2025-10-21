@extends('layouts.base')

@section('main')
  @include('layouts.partials.page_navbar')

  <div class="container-fluid d-flex" style="min-height: calc(100vh - 68px);">
    <div class="row flex-grow-1 w-100">
      <div class="col-md-4 p-0">
        <div class="h-100 w-100 overflow-hidden">
          @yield('image')
        </div>
      </div>

      <div class="col-md-8 d-flex flex-column justify-content-center align-items-start p-5 bg-light">
        <h1 class="fw-bold mb-3">@yield('title')</h1>
        <p class="lead text-muted mb-4">
          @yield('content')
        </p>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    var cookie = @json(request()->cookie('visitor_guid'));
    var exception = @json(request()->is('terms-conditions') || request()->is('privacy'));

    if (!cookie && !exception) {
      acceptCookies();
    }
  });

  function acceptCookies() {
    bootbox.confirm({
      title: 'Accept Cookies',
      message: `
      <p>Cookies are necessary for this website to function properly, for performance measurement, 
        and to provide you with the best experience.</p> 
      <p>By continuing to access or use this site, you acknowledge and consent to our use of cookies in accordance 
        with our <a href='/terms-conditions' target='_blank'>[Terms & Conditions]</a> and 
        <a href='/privacy' target='_blank'>[Privacy Statement]</a>.</p>
      `,
      closeButton: false,
      centerVertical: true,
      onEscape: false,
      buttons: {
        cancel: {
          label: '<i class="fa fa-times"></i> Reject'
        },
        confirm: {
          label: '<i class="fa fa-check"></i> Accept'
        }
      },
      callback: function(confirmed) {
        if (confirmed) {
          $.ajax({
            url: `/consent/accept`,
            type: 'POST',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content')
            },
          });
        } else {
          $.ajax({
            url: `/consent/reject`,
            type: 'POST',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content')
            },
          });
        }
      }
    }); 
  }
</script>
@endpush
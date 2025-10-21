@extends('layouts.guest')

@section('content')
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-6 col-lg-4">
      <div class="p-4 shadow rounded bg-white">
        <p class="h2 mt-2">{!! __('Login <b>Star PT Admin</b>') !!}</p>
        <p class="h5 text-muted mb-4">{{ __('Star Practical Test Admin') }}</p>

        @include('layouts.partials.notification')

        <form id="loginForm">
          <div class="input-group mb-3">
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
              placeholder="{{ __('E-mel') }}" autofocus>
            <span class="input-group-text">
              <i class="fas fa-envelope"></i>
            </span>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control"
              placeholder="{{ __('Kata Laluan') }}">
            <span class="input-group-text">
              <i class="fas fa-lock"></i>
            </span>
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">
              Remember me
            </label>
          </div>

          <div class="d-grid">
            <button class="btn btn-primary" id="submitBtn" type="submit">{{ __('Login') }}</button>
          </div>

          <div class="row justify-content-center mt-3">
            <div id="loading" class="spinner-border text-primary d-none" role="status"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
      e.preventDefault();
      $('#loading').removeClass('d-none');

      const email = $('#email').val();
      const password = $('#password').val();
      const remember = $('#remember').is(':checked');

      $.ajax({
        url: `/login`,
        type: 'POST',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          email: email,
          password: password,
          remember: remember,
        },
        success: (response) => {
          console.log('Login Success');
          window.location.href = '/admin/dashboard';
        },
        error: (err) => {
          let errorMsg = "Login failed.";

          try {
            let response = JSON.parse(err.responseText);
            if (response.message) {
              errorMsg = response.message;
            }
          } catch (e) {
            console.error("Error parsing response:", e);
          }
          bootbox.alert({
            title: '<span class="text-danger">Login Error</span>',
            message: errorMsg,
            buttons: {
              ok: {
                className: 'btn btn-danger'
              }
            }
          });

          $('#loading').addClass('d-none');
        }
      });
    });
  });
</script>
@endpush

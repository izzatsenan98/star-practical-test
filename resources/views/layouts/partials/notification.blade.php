@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (Session::has('successMessage'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success! </strong>{{ session('successMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (Session::has('errorMessage'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong>{{ session('errorMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
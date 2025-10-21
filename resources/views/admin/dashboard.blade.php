@extends('layouts.auth')

@section('title', __('Dashboard'))

@section('content')
<div class="row">
  <div class="col-md-12">
    Welcome, {{ request()->user()->name }} !
  </div>
</div>
@endsection
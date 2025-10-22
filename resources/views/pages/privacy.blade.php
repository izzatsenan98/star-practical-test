@extends('layouts.page')

@section('image')
  <img src="{{ asset('images/privacy.jpg') }}" alt="Privacy Image" class="img-fluid h-100 w-100 object-fit-cover">
@endsection

@section('title', __('Privacy Policy'))

@section('content')
  @include('pages.lorem_ipsum')
@endsection

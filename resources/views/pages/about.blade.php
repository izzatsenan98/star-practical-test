@extends('layouts.page')

@section('image')
  <img src="{{ asset('images/about.jpg') }}" alt="About Us Image" class="img-fluid h-100 w-100 object-fit-cover">
@endsection

@section('title', __('About Us'))

@section('content')
  @include('pages.lorem_ipsum')
@endsection

@extends('layouts.page')

@section('image')
  <img src="{{ asset('images/home.jpg') }}" alt="Home Image" class="img-fluid h-100 w-100 object-fit-cover">
@endsection

@section('title', __('Welcome'))

@section('content')
  @include('pages.lorem_ipsum')<br><br>
  @include('pages.lorem_ipsum')<br><br>
  @include('pages.lorem_ipsum')
@endsection

@extends('layouts.page')

@section('image')
  <img src="{{ asset('images/terms.jpg') }}" alt="Terms Image" class="img-fluid h-100 w-100 object-fit-cover">
@endsection

@section('title', __('Terms & Conditions'))

@section('content')
  @include('pages.lorem_ipsum')
@endsection

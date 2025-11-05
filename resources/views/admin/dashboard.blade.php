@extends('layouts.auth')

@section('title', __('Dashboard'))

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card border-0 shadow-sm p-4 text-center h-100">
      <div class="text-secondary mb-2">
        <i class="fas fa-vote-yea fs-3"></i>
      </div>
      <h6 class="text-muted mb-1">{{ __('Consents This Month') }}</h6>
      <h2 class="fw-bold text-success mb-0">{{ $consentCountThisMonth }}</h2>
      <small class="text-muted">{{ now()->format('F Y') }}</small>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card border-0 shadow-sm p-4 text-center h-100">
      <div class="text-secondary mb-2">
        <i class="fas fa-user-check fs-3"></i>
      </div>
      <h6 class="text-muted mb-1">{{ __('Total Consents') }}</h6>
      <h2 class="fw-bold text-primary mb-0">{{ $totalConsents }}</h2>
      <small class="text-muted">{{ __('All Time') }}</small>
    </div>
  </div>
</div>
@endsection
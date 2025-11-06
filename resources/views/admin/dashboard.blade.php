@extends('layouts.auth')

@section('title', __('Dashboard'))

@section('content')
<div class="row">
  <div class="col-md-3 mb-3">
    <div class="card border-0 shadow-sm p-4 text-center h-100">
      <div class="text-secondary mb-2">
        <i class="fas fa-eye fs-3"></i>
      </div>
      <h6 class="text-muted mb-1">{{ __('Visits This Month') }}</h6>
      <h2 class="fw-bold text-secondary mb-0">{{ $visitsThisMonth }}</h2>
      <small class="text-muted">{{ now()->format('F Y') }}</small>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card border-0 shadow-sm p-4 text-center h-100">
      <div class="text-secondary mb-2">
        <i class="fas fa-users fs-3"></i>
      </div>
      <h6 class="text-muted mb-1">{{ __('Total Visits') }}</h6>
      <h2 class="fw-bold text-secondary mb-0">{{ $totalVisits }}</h2>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card border-0 shadow-sm p-4 text-center h-100">
      <div class="text-primary mb-2">
        <i class="fas fa-vote-yea fs-3"></i>
      </div>
      <h6 class="text-muted mb-1">{{ __('Consents This Month') }}</h6>
      <h2 class="fw-bold text-primary mb-0">{{ $consentsThisMonth }}</h2>
      <small class="text-muted">{{ now()->format('F Y') }}</small>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card border-0 shadow-sm p-4 text-center h-100">
      <div class="text-primary mb-2">
        <i class="fas fa-user-check fs-3"></i>
      </div>
      <h6 class="text-muted mb-1">{{ __('Total Consents') }}</h6>
      <h2 class="fw-bold text-primary mb-0">{{ $totalConsents }}</h2>
    </div>
  </div>

  <div class="col-md-12 mb-3">
    <div class="card border-0 shadow-sm p-4 text-center h-100">
      <div class="card-body">
        <h6 class="text-muted">{{ __('Visits And Consents In ') . date('Y') }}</h6>
        <div class="position-relative mb-4">
          <canvas id="visit-consent-chart" ></canvas>
        </div>
        <div class="d-flex flex-row justify-content-end">
          <span class="mx-2">
            <i class="fas fa-square text-muted"></i> {{ __('Visit') }}
          </span>
          <span>
            <i class="fas fa-square text-primary"></i> {{ __('Consent') }}
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script nonce="{{ csp_nonce() }}">
  $(function() {
    var mode = 'index'
    var intersect = true
    var $visitConsentChart = $('#visit-consent-chart')

    var visitConsentChart = new Chart($visitConsentChart, {
      type: 'line',
      data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JLY', 'AUG', 'SEP', 'OCT', 'NOV', 'DIS'],
        datasets: [{
          fill: false,
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: @json($consentsInMonths),
        },
        {
          fill: false,
          backgroundColor: '#A9A9A9',
          borderColor: '#A9A9A9',
          data: @json($visitsInMonths),
        }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect,
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            }
          }],
        }
      }
    })
  })
</script>
@endpush
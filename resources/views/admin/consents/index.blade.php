@extends('layouts.auth')

@section('title', __('List of Consent Accepted'))

@section('content')
<div class="row">
  <div class="col-lg-12">
    <table id="Consent" class="table table-bordered table-hover table-sm">
      <thead>
        <tr class="text-center">
          <th>#</th>
          <th>{{ __('Guid') }}</th>
          <th>{{ __('IP Address') }}</th>
          <th>{{ __('Version') }}</th>
          <th>{{ __('Accepted At') }}</th>
          <th>{{ __('Expired At') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consents as $key => $consent)
          <tr>
            <td class="text-center">{{ $key + 1 }}</td>
            <td>{{ $consent->guid }}</td>
            <td class="text-center">{{ $consent->ip_address }}</td>
            <td class="text-center">{{ $consent->version }}</td>
            <td class="text-center">{{ $consent->accepted_at }}</td>
            <td class="text-center">{{ $consent->accepted_at->addYears(1) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      $("#Consent").DataTable({
        scrollX: true,
      });
    });
  </script>
@endpush

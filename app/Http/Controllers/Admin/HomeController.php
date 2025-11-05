<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consent;
use Carbon\Carbon;

class HomeController extends Controller
{
  public function index()
  {
    $now = Carbon::now();

    $consentCountThisMonth = Consent::whereYear('accepted_at', $now->year)
      ->whereMonth('accepted_at', $now->month)
      ->count();

    $totalConsents = Consent::count();

    $monthlyConsents = Consent::selectRaw('MONTH(accepted_at) as month, COUNT(*) as total')
      ->whereYear('accepted_at', $now->year)
      ->groupBy('month')
      ->orderBy('month')
      ->pluck('total', 'month');

    return view('admin.dashboard', compact('consentCountThisMonth', 'totalConsents', 'monthlyConsents'));
  }
}

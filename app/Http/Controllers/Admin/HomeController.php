<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consent;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function index()
  {
    $now = Carbon::now();

    $visitsThisMonth = Visit::whereYear('visited_at', $now->year)
      ->whereMonth('visited_at', $now->month)
      ->count();

    $totalVisits = Visit::count();

    $consentsThisMonth = Consent::whereYear('accepted_at', $now->year)
      ->whereMonth('accepted_at', $now->month)
      ->count();

    $totalConsents = Consent::count();

    $visitsInMonths = $this->visitsInMonths();
    $consentsInMonths = $this->consentsInMonths();

    return view('admin.dashboard', compact('visitsThisMonth', 'totalVisits', 'consentsThisMonth', 'totalConsents', 'visitsInMonths', 'consentsInMonths'));
  }

  public function visitsInMonths()
  {
    $visitsPerMonth = Visit::select(
      DB::raw('MONTH(visited_at) as month'),
      DB::raw('COUNT(*) as total')
    )
    ->whereYear('visited_at', now()->year)
    ->groupBy(DB::raw('MONTH(visited_at)'))
    ->pluck('total', 'month')
    ->all();

    $visits = [];
    for ($m = 1; $m <= 12; $m++) {
      $visits[] = $visitsPerMonth[$m] ?? 0;
    }

    return $visits;
  }

  public function consentsInMonths()
  {
    $consentsPerMonth = Consent::select(
      DB::raw('MONTH(accepted_at) as month'),
      DB::raw('COUNT(*) as total')
    )
    ->whereYear('accepted_at', now()->year)
    ->groupBy(DB::raw('MONTH(accepted_at)'))
    ->pluck('total', 'month')
    ->all();

    $consents = [];
    for ($m = 1; $m <= 12; $m++) {
      $consents[] = $consentsPerMonth[$m] ?? 0;
    }

    return $consents;
  }
}

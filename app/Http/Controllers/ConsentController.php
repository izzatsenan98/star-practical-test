<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConsentController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $consents = Consent::orderBy('created_at', 'desc')->get();

    return view('admin.consents.index', compact('consents'));
  }

  public function accept(Request $request)
  {
    Consent::create([
      'guid' => $guid = Str::uuid(),
      'ip_address' => $request->ip(),
      'user_agent' => $request->header('User-Agent'),
      'accepted_at' => now(),
    ]);

    return response()->noContent()->cookie('visitor_guid', $guid, 60 * 24 * 365);
  }

  public function reject()
  {
    $guid = Str::uuid();

    return response()->noContent()->cookie('visitor_guid', $guid, 60 * 24);
  }
}

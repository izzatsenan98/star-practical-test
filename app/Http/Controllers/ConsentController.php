<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
    try {
      Consent::create([
        'guid' => $guid = Str::uuid(),
        'ip_address' => $request->ip(),
        'user_agent' => $request->header('User-Agent'),
        'accepted_at' => now(),
      ]);

      return response()->noContent()->cookie('visitor_guid', $guid, 60 * 24 * 365);
    } catch (Exception $e) {
      Log::error($e->getMessage());
    }
  }

  public function reject()
  {
    try {
      $guid = Str::uuid();

      return response()->noContent()->cookie('visitor_guid', $guid, 60 * 24);
    } catch (Exception $e) {
      Log::error($e->getMessage());
    }
  }
}

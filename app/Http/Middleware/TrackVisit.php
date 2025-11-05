<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (!$request->is('admin/*') && !$request->is('login')) {
      try {
        $visitorGuid = $request->cookie('visitor_guid');

        if (!$visitorGuid) {
          Visit::create([
            'visitor_guid' => Str::uuid(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'visited_at' => now(),
          ]);
        }
      } catch (Exception $e) {
        Log::error($e->getMessage());
      }
    }

    return $next($request);
  }
}

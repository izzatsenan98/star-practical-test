<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
  public function home()
  {
    return view('pages.home');
  }

  public function about()
  {
    return view('pages.about');
  }

  public function privacy()
  {
    return view('pages.privacy');
  }

  public function terms()
  {
    return view('pages.terms');
  }
}

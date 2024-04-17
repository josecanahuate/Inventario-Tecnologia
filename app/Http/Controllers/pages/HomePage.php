<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\So;
use App\Models\Type;
use Illuminate\Http\Request;

class HomePage extends Controller
{
  public function index()
  {
    $n_devices = Device::where('active', true)->count();
    $n_sos = So::where('active', true)->count();
    $n_types = Type::where('active', true)->count();
    return view('content.pages.pages-home', compact('n_devices', 'n_sos', 'n_types'));
  }
}

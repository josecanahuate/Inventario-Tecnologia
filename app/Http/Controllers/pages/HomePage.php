<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use App\Models\Device;
use App\Models\Report;
use App\Models\So;
use App\Models\Type;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomePage extends Controller
{
  public function index()
  {
      //cuando el usuario no tiene ningun rol, se le asignara el rol de 'user'
      $user = Auth::user();
      $rolesifexist = DB::table('model_has_roles')->where('model_id', $user->id)->first();
      
      if(!$rolesifexist) {
        DB::table('model_has_roles')->insert([
          'role_id' => 2,
          'model_type' => 'App\Models\User',
          'model_id' => $user->id
        ]);  
      }


    $n_devices = Device::where('active', true)->count();
    $n_sos = So::where('active', true)->count();
    $n_types = Type::where('active', true)->count();
    $n_backups = Backup::where('status', 'done')->count();
    $n_reports = Report::all()->count();
    $n_users = User::all()->count();
    return view('content.pages.pages-home', compact('n_devices', 'n_sos', 'n_types', 'n_backups', 'n_reports', 'n_users'));
  }
}

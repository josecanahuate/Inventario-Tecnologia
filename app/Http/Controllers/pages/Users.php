<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Users extends Controller
{
  public function index()
  {
    $users = User::all();
    $n_users = User::all()->count();
    return view('content.pages.users', compact('users', 'n_users'));
  }

  public function create() {
    return view('content.pages.users-create');
  }

  public function store(Request $request) {
    /* dd($request->all()); */ //devuelve todo en json
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8',
    ]);
    // Crear nuevo usuario
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect()->route('users.index')->with('info', 'Usuario Creado correctamente');
  }

  public function edit($user_id) {
    $user = User::find($user_id);
    return view('content.pages.users-edit', compact('user', 'user_id'));
  }


  public function update(Request $request, $user_id)
  {
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
      ]);

      $user = User::find($user_id);
      $user->name = $request->name;
      $user->email = $request->email;
  
      // Verificar si se proporcionó una nueva contraseña
      if (!empty($request->new_password)) {
          // Verificar si la contraseña anterior coincide
          if (Hash::check($request->old_password, $user->password)) {
              $user->password = Hash::make($request->new_password);
          } else {
              return redirect()->back()->with('error', 'La contraseña anterior no es correcta');
          }
      }
  
      $user->save();
      return redirect()->route('users.index')->with('info', 'Usuario Actualizado correctamente');
  }
  

  
  public function destroy($user_id)
  {
    $user = User::find($user_id);
    $user->delete();
    return redirect()->route('users.index')->with('info', 'Usuario Eliminado correctamente');
  }

  //cambiando el rol
  public function switch($user_id) {
    $user = User::find($user_id);
    if($user->hasRole('admin')){
      $user->removeRole('admin');
      $user->assignRole('user');
    }else {
      $user->removeRole('user');
      $user->assignRole('admin');
    }  
      return redirect()->route('users.index');
  }
}

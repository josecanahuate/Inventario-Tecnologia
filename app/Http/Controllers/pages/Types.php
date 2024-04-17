<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class types extends Controller
{
  public function index()
  {
    $types = Type::all();
    return view('content.pages.types', compact('types'));
  }

  public function create() {
    return view('content.pages.types-create');
  }

  public function store(Request $request) {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'icon' => 'required',
    ]);

    // Crear nuevo Tipo
    $type = new Type();
    $type->name = $request->name;
    $type->description = $request->description;
    $type->icon = $request->icon;
    $type->save();
    return redirect()->route('types.index')->with('info', 'Tipo Creado correctamente');
  }

  public function edit($type_id) {
    $type = Type::find($type_id);
    return view('content.pages.types-edit', compact('type', 'type_id'));
  }


  public function update(Request $request, $type_id)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'icon' => 'required',
  ]);
      $type = Type::find($type_id);
      $type->name = $request->name;
      $type->description = $request->description;  
      $type->icon = $request->icon;
      $type->save();
      return redirect()->route('types.index')->with('info', 'Tipo Actualizado correctamente');
  }
  

  public function destroy($type_id)
  {
    $type = Type::find($type_id);
    $type->delete();
    return redirect()->route('types.index')->with('info', 'Tipo Eliminado correctamente');
  }

  public function switch($type_id) {
    $type = Type::find($type_id);
    $type->active = !$type->active;
    $type->save();
    return redirect()->route('types.index');
  }
}

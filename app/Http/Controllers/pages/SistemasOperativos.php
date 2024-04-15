<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\So;
use Illuminate\Http\Request;


class SistemasOperativos extends Controller
{
  public function index()
  {
    $sos = So::all();
    return view('content.pages.sos', compact('sos'));
  }

  public function create() {
    return view('content.pages.sos-create');
  }

  public function store(Request $request) {
    $request->validate([
      'name' => 'required',
      'version' => 'required',
      'description' => 'required',
    ]);

    // Crear nuevo Tipo
    $so = new So();
    $so->name = $request->name;
    $so->version = $request->version;
    $so->description = $request->description;
    $so->save();
    return redirect()->route('sos.index')->with('info', 'Sistema Operativo Creado correctamente');
  }

  public function edit($so_id) {
    $so = So::find($so_id);
    return view('content.pages.sos-edit', compact('so', 'so_id'));
  }


  public function update(Request $request, $so_id)
  {
    $request->validate([
        'name' => 'required',
        'version' => 'required',
        'description' => 'required',
      ]);
      $so = So::find($so_id);
      $so->name = $request->name;
      $so->version = $request->version;
      $so->description = $request->description;  
      $so->save();
      return redirect()->route('sos.index')->with('info', 'Sistema Operativo Actualizado correctamente');
  }
  

  public function destroy($so_id)
  {
    $so = So::find($so_id);
    $so->delete();
    return redirect()->route('sos.index')->with('info', 'Sistema Operativo Eliminado correctamente');
  }

  public function switch($so_id) {
    $so = So::find($so_id);
    $so->active = !$so->active;
    $so->save();
    return redirect()->route('sos.index');
  }
}

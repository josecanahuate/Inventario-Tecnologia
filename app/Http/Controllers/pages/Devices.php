<?php

namespace App\Http\Controllers\pages;

use App\Exports\DeviceExport;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\So;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\ExampleMail;
use App\Mail\UpdateDevice;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class devices extends Controller
{
  public function index()
  {
    $devices = Device::all();
    return view('content.pages.devices', compact('devices'));
  }

  public function create() {
    $sos = So::where('active', true)->get();
    $types = Type::where('active', true)->get();
    return view('content.pages.devices-create', compact('sos', 'types'));
  }

  public function store(Request $request) {
    /* dd($request->all()); */
    $request->validate([
      'name' => 'required',
    ]);
    // Crear nuevo Tipo
    $device = new Device();
    $device->name = $request->name;
    $device->description = $request->description;
    $device->sos_id = $request->sos_id;
    $device->type_id = $request->type_id;
    $device->serial_number = $request->serial_number ?? null;
    $device->mac_address = $request->mac_address ?? null;
    $device->ip_address = $request->ip_address ?? null;
    $device->model = $request->model ?? null;
    $device->manufacturer = $request->manufacturer ?? null;
    $device->firmware = $request->firmware ?? null;
    $device->stock = $request->stock ?? null;
    $device->hdd = $request->hdd ?? null;
    $device->ram = $request->ram ?? null;
    $device->cpu = $request->cpu ?? null;
    $device->gpu = $request->gpu ?? null;
    $device->total_slots = $request->total_slots ?? null;
    $device->history = $request->history ?? null;
    $device->save();
    
    //Mandar email al crear un nuevo producto
    Mail::to('josecanahuate05@gmail.com')->send(new ExampleMail($device));
    /* Mail::to($request->user())->send(new ExampleMail($device)); */

    return redirect()->route('devices.index')->with('info', 'Equipo Creado correctamente');
  }


  public function edit($device_id) {
    $device = Device::find($device_id);
    $sos = So::where('active', true)->get();
    $types = Type::where('active', true)->get();
    return view('content.pages.devices-edit', compact('device', 'device_id', 'sos', 'types'));
  }


  public function update(Request $request, $device_id) {
    /* dd($request->all()); */

    $request->validate([
      'name' => 'required',
  ]);
      $device = Device::find($device_id);
      //almacenamiento de imagen
      if($request->hasFile('fileLogo')){
        $file = $request->file('fileLogo');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'public/images/' .$name;
        Storage::put($filePath, file_get_contents($file));
        $url = Storage::url($filePath);
        $array = explode('/storage/public', $url);
        $device->image_url = '/storage/' . $array[1];

        //MODIFICAR LA ACTUALIZACION DE IMAGEN ERROR DE ARRAY[1]

        /* $device->image_url = $url; */
      }
      //almacenamiento de campos
      $device->name = $request->name;
      $device->description = $request->description;
      $device->sos_id = $request->sos_id;
      $device->type_id = $request->type_id;
      $device->serial_number = $request->serial_number ?? null;
      $device->mac_address = $request->mac_address ?? null;
      $device->ip_address = $request->ip_address ?? null;
      $device->model = $request->model ?? null;
      $device->manufacturer = $request->manufacturer ?? null;
      $device->firmware = $request->firmware ?? null;
      $device->stock = $request->stock ?? null;
      $device->hdd = $request->hdd ?? null;
      $device->ram = $request->ram ?? null;
      $device->cpu = $request->cpu ?? null;
      $device->gpu = $request->gpu ?? null;
      $device->total_slots = $request->total_slots ?? null;
      $device->history = $request->history ?? null;
      $device->save();

      //Mandar email al actualizar un nuevo producto
      Mail::to('josecanahuate05@gmail.com')->send(new UpdateDevice($device));

      return redirect()->route('devices.index')->with('info', 'Equipo Actualizado correctamente');
  }
  

  public function destroy($device_id)
  {
    $device = Device::find($device_id);
    $device->delete();
    return redirect()->route('devices.index')->with('info', 'Equipo Eliminado correctamente');
  }

  public function switch($device_id) {
    $device = Device::find($device_id);
    $device->active = !$device->active;
    $device->save();
    return redirect()->route('devices.index');
  }

  public function export() {
    return Excel::download(new DeviceExport, 'devices.xlsx');
    /* return Excel::download(new DeviceExport, 'invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF); */ //exportar excel a pdf
  }

}

<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use App\Models\Backup;
use Illuminate\Http\Request;
use App\Jobs\BackupProcess;
use Illuminate\Support\Facades\Storage;

class Backups extends Controller
{

    public function index()
    {
      $backups = Backup::all();
      return view('content.pages.backups', compact('backups'));
    }
 
    public function create() {
      //llamando al job
      BackupProcess::dispatch();
      return redirect()->route('backups.index')->with('info', 'Backup Creado correctamente');
    }
    

    public function destroy($backup_id)
    {
      $backups = Backup::find($backup_id);
      Storage::delete('public/backups/'.$backups->name);
      $backups->delete();
      return redirect()->route('backups.index')->with('info', 'Backup Eliminado correctamente');
    }
    
    
}

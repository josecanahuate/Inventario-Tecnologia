<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Jobs\ReportProcess;
use App\Models\Device;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;



class Reports extends Controller
{

    public function index()
    {
      $reports = Report::all();
      return view('content.pages.reports', compact('reports'));
    }
 
    public function create() {
        $devices = Device::all();
        $date = (new \DateTime())->format('Y-m-d_H-i-s'); // Formatea y asigna la fecha
        $pdf = Pdf::loadView('pdf.devices', compact('devices')); // devuelve una vista
        /* Storage::put("app/public/pdf_{$date}.pdf", $pdf->output()); */
        $pdfPath = "public/pdf_{$date}.pdf";
        Storage::put($pdfPath, $pdf->output());

        $report = new Report();
        $report->url = $pdfPath;
        $report->save();
        return redirect()->route('reports.index')->with('file', $pdfPath);
    }
    

    public function destroy($report_id)
    {
      $reports = Report::find($report_id);
      Storage::delete($reports->url);
      $reports->delete();
      return redirect()->route('reports.index')->with('info', 'Report Eliminado correctamente');
    }
    
}

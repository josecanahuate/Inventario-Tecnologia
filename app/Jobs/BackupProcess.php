<?php

namespace App\Jobs;

use App\Models\Backup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class BackupProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //backup
        $backup = new Backup();
        $backup->status = 'pending';
        $backup->url = 'http://localhost';
        $backup->name ='backup';
        $backup->save();
    
        $storagePath = storage_path('app/public/backups');
        $date = (new \DateTime())->format('Y-m-d_H-i-s'); // Formatea y asigna la fecha
        $name = "backup_{$date}.sql";

        //creando y ejecutando comando mysqldump
        $command = "mysqldump -u root --databases inventario-tecnologia > {$storagePath}/backup_{$date}.sql";
        exec($command, $output, $err);
        /* sleep(10); */ //espera 10seg
        $backup->status = 'done';
        $backup->name = $name;
        $backup->url = "http://127.0.0.1:8000/storage/backups/backup_{$date}.sql";
        $backup->save();
    }
    
}

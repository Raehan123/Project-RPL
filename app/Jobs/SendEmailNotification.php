<?php

namespace App\Jobs;

use App\Mail\Notification;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $bimbingans;

    /**
     * Create a new job instance.
     */
    public function __construct($bimbingans)
    {
        $this->bimbingans = $bimbingans;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $bimbingan = $this->bimbingans;
        $dosen = Dosen::findOrFail($bimbingan->dosen_id);
        $mahasiswa = Mahasiswa::findOrFail($bimbingan->mahasiswa_id);

        Mail::to($dosen->email)->send(new Notification($bimbingan, $dosen->email, $dosen->nama, $mahasiswa->email, $mahasiswa->nama));
        Mail::to($mahasiswa->email)->send(new Notification($bimbingan, $dosen->email, $dosen->nama, $mahasiswa->email, $mahasiswa->nama));
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Notifications\BimbinganNotification;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();
        // Menambahkan notifikasi untuk mahasiswa setelah verifikasi email
        $notification = Notification::create([
            'mahasiswa_id' => $request->user()->id,  // Menggunakan ID user yang sudah login (misalnya mahasiswa)
            'dosen_id' => null,
            'message' => 'Verifikasi email berhasil! Sekarang Anda bisa melakukan bimbingan TA.',
            'notify_at' => Carbon::now(),  // Notifikasi langsung terkirim
        ]);

        // Kirimkan notifikasi email kepada mahasiswa
        $request->user()->notify(new BimbinganNotification($notification));

        return back()->with('status', 'verification-link-sent');
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class BimbinganNotification extends Notification
{
    use Queueable;

    protected $notification;

    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    public function via($notifiable)
    {
        // Menentukan saluran notifikasi (email, database, dll)
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // Mengirimkan email
        return (new MailMessage)
            ->subject('Notifikasi Bimbingan TA')
            ->greeting('Halo ' . $notifiable->name)
            ->line('Pesan: ' . $this->notification->message)
            ->action('Lihat Bimbingan', url('/bimbingan'))
            ->line('Terima kasih telah menggunakan aplikasi kami!');
    }

    public function toArray($notifiable)
    {
        // Notifikasi dalam format array, jika Anda ingin menyimpan ke database
        return [
            'message' => $this->notification->message,
            'notify_at' => $this->notification->notify_at,
        ];
    }
}

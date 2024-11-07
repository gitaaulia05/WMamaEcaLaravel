<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Kasbon;

class KasbonJatuhTempo extends Notification
{
    protected $kasbon;

    public function __construct(Kasbon $kasbon)
    {
        $this->kasbon = $kasbon;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Notifikasi Jatuh Tempo Kasbon')
                    ->line('Kasbon Anda dengan jumlah Rp' . number_format($this->kasbon->jumlah, 2) . ' akan jatuh tempo pada ' . $this->kasbon->tanggal_jatuh_tempo->format('d M Y') . '.')
                    ->action('Lihat Detail', url('/kasbon/' . $this->kasbon->id))
                    ->line('Segera lakukan pembayaran sebelum jatuh tempo!');
    }
}

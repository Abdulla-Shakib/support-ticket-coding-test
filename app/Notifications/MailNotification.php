<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $ticket;
    public $user_name;
    public $status;


    /**
     * Create a new notification instance.
     */
    public function __construct($ticket, $user_name, $status)
    {
        $this->ticket = $ticket;
        $this->user_name = $user_name;
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Ticket Notification')
            ->view('emails.ticket_notification', [
                'ticket' => $this->ticket,
                'user_name' => $this->user_name,
                'status' => $this->status,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

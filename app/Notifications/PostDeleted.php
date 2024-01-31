<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostDeleted extends Notification
{
    use Queueable;

    protected $postId;

    public function __construct($postId)
    {
        $this->postId = $postId;
    }

    public function databaseType(object $notifiable): string
    {
        return 'post_deleted';
    }

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('A post has been deleted.')
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'A post has been deleted',
        ];
    }
}

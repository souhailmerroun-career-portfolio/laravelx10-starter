<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Post; // Assuming you have a Post model

class PostUpdated extends Notification
{
    use Queueable;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the notification's database type.
     *
     * @return string
     */
    public function databaseType(object $notifiable): string
    {
        return 'post_updated';
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('A post has been updated: ' . $this->post->title)
            ->action('View Post', url('/posts/' . $this->post->id))
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'A post has been updated',
            'url' => route('posts.show', $this->post->id),
        ];
    }
}

<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Comment $comment,public Post $post)
    {
        //
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
        return ( new MailMessage )
            ->line('User "'.$this->comment->user->username.'" has made a comment on your post. Please see comment bellow.')
            ->line('"' . $this->comment->comment . '"')
            ->action('View Post', url(route('post.view', $this->post->id)))
            ->line('Thank you for using our application!')
//            ->salutation("My salutation")
            ;
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
<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Publication;
use App\Models\Comment;
use App\Models\User;


class SomeoneReplied extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var User
     */
    private User $user;
    /**
     * @var Comment
     */
    private Comment $comment;
    /**
     * @var Publication
     */
    private Publication $publication;

    /**
     * Create a new notification instance.
     * @param User $fromUser
     * @param Comment $comment
     * @param Publication $publication
     */
    public function __construct(User $fromUser, Comment $comment, Publication $publication)
    {
        $this->user = $fromUser;
        $this->comment = $comment;
        $this->publication = $publication;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'username' => $this->user->username,
            'user_avatar' => $this->user->avatar,
            'publication_id' => $this->publication->id,
            'publication_title' => $this->publication->title,
            'comment_id' => $this->comment->id,
            'comment_comment_text' => $this->comment->comment_text,
            'comment_created_at' => $this->comment->created_at
        ];
    }
}

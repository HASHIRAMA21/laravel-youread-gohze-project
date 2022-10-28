<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Publication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\PusherPushNotifications\PusherChannel;
use NotificationChannels\PusherPushNotifications\PusherMessage;

class NewVPublicationReleased extends Notification implements ShouldQueue
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @param Video $video
     */
    public function __construct(Publication $publication)
    {
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
        return ['mail', PusherChannel::class];
    }

    public function toPushNotification($notifiable)
    {
        return PusherMessage::create()
            ->android()
            ->badge(1)
            ->sound('success')
            ->title('New '. $this->publication->type .' "'. $this->publication->title .'" ' . 'released!')
            ->body('Click to Watch Now!')
            ->link(route('frontend.publication.show', $this->publication->slug));
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Dear user')
                    ->line('New '. $this->publication->type .' "'. $this->publication->title .'" ' . 'released!')
                    ->action('Click to Watch', route('frontend.videos.show', $this->publication->slug))
                    ->line('Thank you for using our application!');
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
            //
        ];
    }
}

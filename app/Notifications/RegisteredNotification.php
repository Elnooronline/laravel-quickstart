<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisteredNotification extends Notification
{
    use Queueable;

    /**
     * The key of the target instance.
     *
     * @var int|string
     */
    public $target;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($target)
    {
        $this->target = $target;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'target_key' => $this->target,
            'target_type' => User::class,
            'title' => 'notifications.registered.title', // trans('notifications.registered.title')
            'body' => 'notifications.registered.body', // trans('notifications.registered.body')
            'dashboard_route' => 'dashboard.users.show',
            'dashboard_route_data' => [$this->target], // route('dashboard.users.show', [$this->target])
            'route' => 'users.show',
            'route_data' => [$this->target], // route('users.show', [$this->target])
        ];
    }
}

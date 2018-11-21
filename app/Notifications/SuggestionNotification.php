<?php

namespace App\Notifications;

use App\Model\Suggestion;
use App\Model\SuggestionType;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuggestionNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $suggestion;
    public $type;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Suggestion $suggestion , SuggestionType $type)
    {
        //
        $this->suggestion = $suggestion;
        $this->type = $type;

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
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
        public function toArray()
    {
        return [
           'data' => $this->suggestion->toArray(),
           'type' => $this->type->toArray()
        ] ;
    }
}

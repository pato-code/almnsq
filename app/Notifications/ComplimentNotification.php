<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Model\Complaint;


class ComplimentNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $compliment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function __construct(Complaint $compliment)
    {
        $this->compliment = $compliment;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\DatabaseNotification
     */
//    public function toDatabase ($notifiable)
//    {
//        return [
//          'name' => $this->compliment->name,
//          'strengths' => $this->compliment->strengths,
//          'notes' => $this->compliment->notes,
//          'file' => $this->compliment->file
//        ];
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray()
    {
        return $this->compliment->toArray() ;
    }
}

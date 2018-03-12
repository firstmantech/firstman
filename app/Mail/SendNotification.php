<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notification;

class SendNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $notification;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $notification = Notification::latest()->get();

        return $this->view('email.notification')
        ->with('id', $this->notification->id);
    }
}

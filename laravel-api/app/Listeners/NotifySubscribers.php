<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Mail\PostPublishedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifySubscribers implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        foreach ($event->post->website->users as $user) {
            info("Sending email to user: " . $user->email);

            Mail::to($user)
                ->send(new PostPublishedMail($event->post));
        }
    }
}

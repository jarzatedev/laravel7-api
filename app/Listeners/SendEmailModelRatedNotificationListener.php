<?php

namespace App\Listeners;

use App\Events\ModelRatedEvent;
use App\Notifications\ModelRatedNotification;
use App\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailModelRatedNotificationListener
{

    public function __construct()
    {
        //
    }

    public function handle(ModelRatedEvent $event)
    {
        $rateable = $event->getRateable();

        if ($rateable instanceof Product) {
            $rateable->user->notify(new ModelRatedNotification(
                $event->getQualifier()->name,
                $rateable->name,
                $event->getScore()
            ));
        }
    }
}

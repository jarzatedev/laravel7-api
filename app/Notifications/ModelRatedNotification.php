<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ModelRatedNotification extends Notification
{
    use Queueable;

    private string $qualifierName;
    private string $productName;
    private float $score;

    public function __construct(string $qualifierName, string $productName, float $score)
    {
        $this->qualifierName = $qualifierName;
        $this->productName = $productName;
        $this->score = $score;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line("{ $this->qualifierName } has rated your product: { $this->productName } with { $this->score } stars");
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // Use when you want to run in backgruound
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlacedNotification extends Notification
{
    use Queueable;
    
    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        // Both channels active
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Order Confirmation - #' . $this->order->id)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Your order has been placed successfully.')
            ->line('Order ID: ' . $this->order->id)
            ->line('Total Amount: Rs. ' . number_format($this->order->total, 2))
            ->action('View Order Details', url('/orders/' . $this->order->id))
            ->line('Thank you for shopping with us!');
    }

    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'total' => $this->order->total,
            'message' => 'New order placed successfully.'
        ];
    }
}
<?php
namespace domain\events;

/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 10/02/15
 * Time: 15:21
 */
use Illuminate\Mail\Mailer;

class ConfirmationEmailHandler
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function subscribe($events)
    {
        $events->listen('user.register', 'events\ConfirmationEmailHandler');
    }

    public function handle($user)
    {
        $data = 'WELCOME';
        $this->mailer->send('emails.welcome', $data, function ($message) use ($user) {
            $message->to($user->email, $user->first_name)
                ->subject('Welcome to DeliveryGuy!');
        });
    }
}
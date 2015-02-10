<?php
namespace events;

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

    public function handle($user){
        //send email
    }
}
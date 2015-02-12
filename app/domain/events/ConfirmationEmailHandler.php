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
    private $fullname;
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function subscribe($events)
    {
        $events->listen('employee.create', 'events\ConfirmationEmailHandler');
    }

    public function handle($employe)
    {
        $data = 'WELCOME';
        $this->fullname = $employe->first_name.' '.$employe->last_name;
        $this->mailer->send('emails.welcome', $data, function ($message) use ($employe) {
            $message->to($employe->email, $this->fullname)
                ->subject('Welcome to DeliveryGuy!');
        });
    }
}
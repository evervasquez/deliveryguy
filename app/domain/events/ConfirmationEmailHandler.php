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
        $events->listen('employee.create', 'domain\events\ConfirmationEmailHandler@onSendMessage');
    }

    public function onSendMessage($employee)
    {
        $data = array('message'=>'WELCOME');
        \Mail::send('emails.welcome', $data, function($message)
        {
            $message->to('pever@unsm.edu.pe', 'Sonico')->subject('This is a demo!');
        });
    }
}
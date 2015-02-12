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
        $this->fullname = $employee->first_name.' '.$employee->last_name;
        $this->mailer->send('emails.welcome', $data, function ($message) use ($employee) {
            $message->to($employee->email, $this->fullname)
                ->subject('Welcome to DeliveryGuy!');
        });
    }
}
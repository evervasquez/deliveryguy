<?php
namespace domain\events;

/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 10/02/15
 * Time: 15:21
 */
use domain\utils\Cript;
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
        $data = array("key"=>sha1($employee->email));
        $url = route('confirmation').'?key='.Cript::dataEncriptar($data);
        $code_confirmation = array('code_confirmation'=>$url);
        \Mail::send('emails.confirmation', $code_confirmation, function($message) use ($employee)
        {
            $message->to($employee->email, $employee->first_name)->subject('Welcome to DeliveryGuy!');
        });
    }
}
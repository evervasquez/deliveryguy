<?php
namespace domain\events;

/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 10/02/15
 * Time: 15:21
 */
use domain\Utils;
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
        $events->listen('employee.create', 'domain\events\ConfirmationEmailHandler@onSendMessage');
    }

    public function onSendMessage($employee)
    {
        $url = route('confirmation') . '?' . $this->encriptInfo($employee);
        $code_confirmation = array('code_confirmation' => $url);
        \Mail::send('emails.confirmation', $code_confirmation, function ($message) use ($employee) {
            $message->to($employee->email, $employee->first_name)->subject('Welcome to DeliveryGuy!');
        });

        return \View::make('sign-up-confirmation');
    }

    /**
     * encript info
     * @param $employee
     * @return string
     */
    private function encriptInfo($employee)
    {
        $data = [
            'email' => $employee->email,
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name
        ];

        //sha1 para confirmar data
        $encript = sha1(implode('|', $data));

        //agregamos a data la key
        $data['key'] = $encript;

        return http_build_query(Utils::dataEncriptar($data));
    }
}
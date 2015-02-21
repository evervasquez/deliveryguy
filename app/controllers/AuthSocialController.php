<?php
use domain\social\GoogleLogin;
use domain\social\FacebookLogin;
use domain\delivery\Employee\EmployeeRepositorie;
use Illuminate\Events\Dispatcher;
use domain\delivery\Employee\EmployeeManager;

class AuthSocialController extends \BaseController
{
    protected $google;
    protected $facebook;
    protected $employeeRepo;
    protected $events;

    function __construct(
        Dispatcher $event,
        EmployeeRepositorie $repo,
        GoogleLogin $google,
        FacebookLogin $facebook)
    {
        $this->google = $google;
        $this->facebook = $facebook;
        $this->employeeRepo = $repo;
        $this->events = $event;
    }

    public function fbLogin()
    {
        return $this->facebook->login();
    }

    public function fbCallback()
    {
        $code = Input::get('code');

        $user = $this->facebook->callback($code);

        $data = array(
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'email' => $user->getEmail()
        );

        $manager = new EmployeeManager($data);

        if ($manager->passes()) {
            $employee = $this->employeeRepo->createUserFacebook($user);
            $this->events->fire('employee.create', array($employee));
            return Redirect::route('showViewSendingEmail');
        } else {
            return \Redirect::back()->withInput()->withErrors($this->manager->getErrors());
        }

    }

}
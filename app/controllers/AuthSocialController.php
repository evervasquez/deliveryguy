<?php
use domain\social\GoogleLogin;
use domain\social\FacebookLogin;
use domain\delivery\Employee\EmployeeRepositorie;
use Illuminate\Events\Dispatcher;

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
        $this->events=$event;
    }

    public function fbLogin()
    {
        return $this->facebook->login();
    }

    public function fbCallback()
    {
        $code = Input::get('code');
        $user = $this->facebook->callback($code);

        $employee = $this->employeeRepo->create($user);

        $this->events->fire('employee.create', array($employee));
        return \View::make('signup-confirmation');
    }

}
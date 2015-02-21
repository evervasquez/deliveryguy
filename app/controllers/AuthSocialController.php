<?php
use domain\social\GoogleManager;
use domain\social\FacebookManager;
use domain\delivery\Employee\EmployeeRepositorie;

class AuthSocialController extends \BaseController
{
    protected $google;
    protected $facebook;
    protected $employeeRepo;

    function __construct(EmployeeRepositorie $repo, GoogleManager $google, FacebookManager $facebook)
    {
        $this->google = $google;
        $this->facebook = $facebook;
        $this->employeeRepo = $repo;
    }

    public function fbLogin()
    {
        return $this->facebook->loginWithFacebook();
    }

    public function fbCallback()
    {
        $code = Input::get('code');
        $graphObject = $this->facebook->manageCallback($code);

        dd($graphObject);
    }
}
<?php
use domain\social\GoogleLogin;
use domain\social\FacebookLogin;
use domain\delivery\Employee\EmployeeRepositorie;
use Illuminate\Events\Dispatcher;
use domain\delivery\AuthSocial\SocialManager;

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


    //region LOGIN_FACEBOOK
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

        //manager for facebook
        $manager = new SocialManager($data);

        if ($manager->passes()) {
            $employee = $this->employeeRepo->createUserSocial($data);
            $this->events->fire('confirmation.email.register', array($employee));
            return Redirect::route('showViewSendingEmail');
        } else {
            return \Redirect::back()->withInput()->withErrors($manager->getErrors());
        }

    }
    //endregion


    //region LOGIN_GOOGLE
    public function googleLogin()
    {
        return $this->google->login();
    }

    public function googleCallback()
    {
        $code = Input::get('code');
        $googleUser = $this->google->callback($code);
//        echo '<pre>'; print_r($user);exit;

        $data = array(
            'first_name' => $googleUser->givenName,
            'last_name' => $googleUser->familyName,
            'email' => $googleUser->email,
            'picture' => $googleUser->picture,
            'google_id' => $googleUser->id
        );

        //manager social google
        $manager = new SocialManager($data);

        if ($manager->passes()) {
            $employee = $this->employeeRepo->createUserSocial($data);
            $this->events->fire('confirmation.email.register', array($employee));
            return Redirect::route('showViewSendingEmail');
        } else {
            return \Redirect::back()->withInput()->withErrors($manager->getErrors());
        }

    }
    //endregion
}
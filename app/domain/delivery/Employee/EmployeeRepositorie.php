<?php

namespace domain\delivery\Employee;


use domain\delivery\Base\BaseRepository;
use domain\delivery\InterfaceRepository;
use domain\social\SocialGoogle;
use domain\social\SocialManager;

class EmployeeRepositorie extends BaseRepository implements InterfaceRepository,SocialManager
{

    /**
     * create new record
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $max = $this->findMaxId();
        $employee = new Employee();
        $employee->code = 'E' . $max;
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->email = $data['email'];
        $employee->save();
        return $employee;
    }

    /**
     * find by Id
     * @param $id
     * @return mixed
     */
    public function findId($id)
    {
        // TODO: Implement findId() method.
    }

    /**
     * delete record by Id
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * get All records
     * @return mixed
     */
    public function all()
    {
        // TODO: Implement all() method.
    }

    /**
     * get Id max
     * @return mixed
     */
    public function findMaxId()
    {
        return Employee::whereNull('deleted_at')->max('id');
    }

    public function loginWithGoogle()
    {

        // get data from input
        $code = \Input::get( 'code' );

        // get google service
        $googleService = \OAuth::consumer( 'Google' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

            $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            echo $message. "<br/>";

            //Var_dump
            //display whole array().
            dd($result);

        }
        // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return \Redirect::to( (string)$url );
        }
    }

    public function loginWithFacebook()
    {
        // TODO: Implement loginWithFacebook() method.
    }


}
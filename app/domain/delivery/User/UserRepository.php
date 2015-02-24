<?php
namespace domain\delivery\User;

use Cartalyst\Sentry\Facades\CI\Sentry;
use domain\delivery\InterfaceRepository;

class UserRepository implements InterfaceRepository
{
    /**
     * create new record || Sentry
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        //create user for Sentry
        Sentry::createUser(array(
            'code_user' => base64_decode(base64_decode($data['_type'])),
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
            'activated' => true,
        ));
    }

    /**
     * get All records
     * @return mixed
     */
    public function all()
    {
        return User::all();
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
     * find by Id
     * @param $id
     * @return mixed
     */
    public function findId($id)
    {
        try {
            return User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }

    /**
     * get Id max
     * @return mixed
     */
    public function findMaxId()
    {
        $id = \DB::table('users')->max('id');
        return $id;
    }

}
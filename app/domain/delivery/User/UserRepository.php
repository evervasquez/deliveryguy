<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 04/11/14
 * Time: 01:52 AM
 */

namespace domain\delivery\User;

use Carbon\Carbon;
use domain\delivery\InterfaceRepository;

class UserRepository implements InterfaceRepository
{
    /**
     * create new record
     * @param $data
     * @return mixed
     */
    public function create($data)
    {

        $user = new User();
        $user->code_user = base64_decode(base64_decode($data['_type']));
        $user->email = $data['email'];
        $user->password = \Hash::make($data['password']);
        $user->activated_at = Carbon::now();
        $user->save();
        return $user;
    }

    /**
     * get All records
     * @return mixed
     */
    public function all()
    {
        return User::whereNull('deleted_at')->all();
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
        // TODO: Implement findId() method.
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
<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 04/11/14
 * Time: 01:52 AM
 */

namespace domain\delivery\User;

use domain\delivery\InterfaceRepository;

class UserRepository implements InterfaceRepository{
    /**
     * create new record
     * @param $data
     * @return mixed
     */
    public function create($data)
    {

       $user = new User();
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
<?php

namespace domain\delivery;

/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 11/02/15
 * Time: 14:48
 */
interface InterfaceRepository
{
    /**
     * create new record
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * find by Id
     * @param $id
     * @return mixed
     */
    public function findId($id);

    /**
     * delete record by Id
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * get All records
     * @return mixed
     */
    public function all();

    /**
     * get Id max
     * @return mixed
     */
    public function findMaxId();
}
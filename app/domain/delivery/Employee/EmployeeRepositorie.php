<?php

namespace domain\delivery\Employee;


use domain\delivery\Base\BaseRepository;
use domain\delivery\InterfaceRepository;

class EmployeeRepositorie extends BaseRepository implements InterfaceRepository
{
    /**
     * create new record
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        if (count($data) > 2) {
            $max = $this->findMaxId();
            $employee = new Employee();
            $employee->code = 'E' . $max;
            $employee->first_name = $data['first_name'];
            $employee->last_name = $data['last_name'];
            $employee->email = $data['email'];
            $employee->save();
            return $employee;
        }
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

}
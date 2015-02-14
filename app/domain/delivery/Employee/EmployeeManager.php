<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 11/02/15
 * Time: 16:13
 */

namespace domain\delivery\Employee;


use domain\delivery\Base\BaseManager;

class EmployeeManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees'
        ];

        return $rules;
    }


}
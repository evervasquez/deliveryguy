<?php

namespace delivery\Employee;


use delivery\Base\BaseRepository;

class EmployeeRepositorie extends BaseRepository
{

    public function create($data)
    {
        $employee = new Employee();
        $employee->gcm_regid = $data['regId'];
        $employee->fullname = $data['fullname'];
        $employee->email = $data['email'];
        $employee->driver_licence = '000-000';
        $employee->property_card = '000-000';
        $employee->bank_account = '000-000-000';
        $employee->id_card = '000-000-000';
        $employee->sex = 'M';
        $employee->created_at = $this->getCreatedAt();
        $employee->updated_at = $this->getUpdateAt();
        if ($employee->save()) {
            $idmax = Employee::max('id');
            $result = \DB::table('employees')->whereNull('deleted_at')->where('id', '=', $idmax)->get();
            return \Response::json(array(
                "Result" => "OK",
                "data" => $result
            ));
        } else {
            return \Response::json(array(
                "Result" => "ERROR"
            ));
        }
    }
} 
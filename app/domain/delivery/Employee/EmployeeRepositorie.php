<?php

namespace domain\delivery\Employee;


use domain\delivery\Base\BaseRepository;

class EmployeeRepositorie extends BaseRepository
{

    public function create($data)
    {
        $idmax = Employee::max('id');
        $employee = new Employee();
        $employee->id = $idmax +1;
        $employee->full_name = utf8_encode($data['fullname']);
        $employee->address = "jiron #amonarca 235";
        $employee->phone = "97614258";
        $employee->email = $data['email'];
        $employee->driver_licence = '000-000';
        $employee->property_card = '000-000';
        $employee->bank_account = '000-000-000';
        $employee->id_card = '000-000-000';
        $employee->sex = 'M';
        $employee->created_at = $this->getCreatedAt();
        $employee->updated_at = $this->getUpdateAt();
        $employee->gcm_regid = $data['regid'];
        if ($employee->save()) {
            $idmax = Employee::max('id');
            $result = \DB::table('employees')->whereNull('deleted_at')
                ->where('id', '=', $idmax)
                ->select('id','gcm_regid','full_name','email','driver_licence','property_card','bank_account',
                            'id_card','sex')
                ->get();
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
<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 20/11/14
 * Time: 12:59 AM
 */

namespace delivery\Company;


class CompanyRepositorie
{
    public function getAll()
    {
        $companies = \DB::table('companies')
            ->whereNull('deleted_at')
            ->select('id','company_name', 'address', 'phone', 'latitude', 'longitude')
            ->get();

        return $companies;
    }

    public function create($data)
    {
        $company = new Company();
        $company->company_name = $data['company_name'];
        $company->address = $data['company_address'];
        $company->phone = $data['company_phone'];
        $company->latitude = $data['company_latitude'];
        $company->longitude = $data['company_longitude'];
        $company->bank_account = $data['company_bank'];
        if ($company->save()) {
            return true;
        } else {
            return false;
        }

    }

    public function objectToArray($object)
    {
        $array = array();
        foreach ($object as $member => $data) {
            $array[$member] = $data;
        }
        return $array;
    }
}
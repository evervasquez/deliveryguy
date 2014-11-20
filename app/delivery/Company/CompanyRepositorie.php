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

    public function create($data)
    {
        $company = new Company();
        $company->company_name = $data['company_name'];
        $company->address = $data['company_address'];
        $company->phone = $data['company_phone'];
        $company->latitude = $data['company_latitude'];
        $company->longitude = $data['company_longitude'];
        if ($company->save()) {
            return true;
        } else {
            return false;
        }

    }
} 
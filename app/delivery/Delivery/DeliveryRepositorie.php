<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/12/14
 * Time: 03:01 PM
 */

namespace delivery\Delivery;


class DeliveryRepositorie {

    public function storeCompany()
    {
        return \DB::table('companies')->whereNull('deleted_at')->select('id','company_name')->get();
    }
} 
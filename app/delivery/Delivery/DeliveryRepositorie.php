<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/12/14
 * Time: 03:01 PM
 */

namespace delivery\Delivery;


class DeliveryRepositorie
{
    public function getAll()
    {
        $deliveries = \DB::table('deliveries')
            ->join('companies','deliveries.company_id','=','companies.id')
            ->join('customers','deliveries.customer_id','=','customers.id')
            ->join('type_buys','deliveries.typebuy_id','=','type_buys.id')
            ->whereNull('deliveries.deleted_at')
            ->select('deliveries.id','companies.company_name','deliveries.delivery_code', 'customers.fullname',
                'type_buys.description', 'deliveries.datetime_reservation',
                'deliveries.datetime_confirmation')
            ->get();

        return $deliveries;
    }

    public function storeCompany()
    {
        return \DB::table('companies')->whereNull('deleted_at')->select('id', 'company_name')->get();
    }

    public function storeCustomers()
    {
        return \DB::table('customers')->whereNull('deleted_at')->select('id', 'fullname')->get();
    }

    public function create($datos)
    {
        $idmax = \DB::table('deliveries')->whereNull('deleted_at')->max('id');
        $delivery = new Delivery();
        $delivery->id = $idmax + 1;
        $delivery->delivery_code = 'PRUEBA-000' . ($idmax + 1);
        $delivery->company_id = $datos['company_id'];
        $delivery->customer_id = $datos['customer_id'];
        $delivery->typebuy_id = $datos['typebuy_id'];
        if ($delivery->save()) {
            $max = \DB::table('deliveries')->whereNull('deleted_at')->max('id');
            $delivery = \DB::table('deliveries')->where('id', '=', $max)->get();
            return \Response::json(array(
                "Result" => "OK",
                "delivery" => $delivery
            ));
        } else {
            return \Response::json(array(
                "Result" => "ERROR"
            ));
        }
    }

}
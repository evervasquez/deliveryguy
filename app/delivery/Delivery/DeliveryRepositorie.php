<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/12/14
 * Time: 03:01 PM
 */

namespace delivery\Delivery;


use delivery\Base\BaseRepository;

class DeliveryRepositorie extends BaseRepository
{
    private static $RESERVATION = 0;
    private static $CONFIRMATION = 1;

    public function getAll()
    {
        $deliveries = \DB::table('deliveries')
            ->join('companies', 'deliveries.company_id', '=', 'companies.id')
            ->join('customers', 'deliveries.customer_id', '=', 'customers.id')
            ->join('type_buys', 'deliveries.typebuy_id', '=', 'type_buys.id')
            ->whereNull('deliveries.deleted_at')
            ->select('deliveries.id', 'companies.company_name', 'deliveries.delivery_code', 'customers.fullname',
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
        $delivery->deliveryTotal = $datos['amount'];
        $delivery->delivery = $datos['amount'] * 0.3;
        if ($delivery->save()) {
            $max = \DB::table('deliveries')->whereNull('deleted_at')->max('id');
            $delivery = \DB::table('deliveries')->where('id', '=', $max)->select('id as serverId', 'delivery_code', 'created_at')->get();
            return $delivery;
        } else {
            return \Response::json(array(
                "Result" => "ERROR"
            ));
        }
    }

    public function update($data, $id)
    {
        try{
        $delivery = Delivery::find($id);
        if ($data['status'] == self::$RESERVATION) {
            $delivery->datetime_reservation = $this->getUpdateAt();
        } elseif ($data['status'] == self::$CONFIRMATION) {
            $delivery->datetime_confirmation = $this->getUpdateAt();
        }
        if ($delivery->save()) {
            $delivery = $this->find($id);
            return $delivery;
        } else {
            return \Response::json(array(
                "Result" => "ERROR"
            ));
        }
        }catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function find($id)
    {
        $delivery = \DB::table('deliveries')
            ->join('companies', 'deliveries.company_id', '=', 'companies.id')
            ->join('customers', 'deliveries.customer_id', '=', 'customers.id')
            ->where('deliveries.id', '=', $id)
            ->select('deliveries.id as serverId', 'deliveries.deliveryTotal', 'companies.company_name', 'deliveries.created_at', 'deliveries.datetime_reservation',
                'companies.address', 'companies.phone', 'companies.latitude', 'companies.longitude',
                'customers.fullname', 'customer.phone as customer_phone')
            ->get();
        return $delivery;
    }
}
<?php

class BaseController extends Controller
{

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }


    protected function sendPush($json, $status)
    {
        $employees = DB::table('employees')->whereNull('deleted_at')->select('id', 'email', 'gcm_regid')->distinct()->get();

        $device = array();

        foreach ($employees as $employee) {
            $device[] = PushNotification::Device($employee->gcm_regid);
        }

        $devices = PushNotification::DeviceCollection($device);

        PushNotification::app('appNameAndroid')
            ->to($devices)
            ->send("nuevo pedido", array(
                "data" => array(
                    "data" => $json,
                    "status" => $status
                )
            ));
    }


}

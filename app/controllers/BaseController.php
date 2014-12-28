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
        $employees = DB::table('employees')->whereNull('deleted_at')->select('id','email', 'gcm_regid')->distinct()->get();
        foreach ($employees as $employee) {
            PushNotification::app('appNameAndroid')
                ->to($employee->gcm_regid)
                ->send("nuevo pedido", array(
                    "data" => array(
                        "data" => $json,
                        "status" => $status
                    )
                ));
            return $json;
        }
    }
}

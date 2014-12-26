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

    protected function sendPush($json)
    {
        $employees = DB::table('employees')->whereNull('deleted_at')->select('id', 'full_name', 'email','gcm_regid')->get();
        foreach ($employees as $employee) {
            PushNotification::app('appNameAndroid')
                ->to($employee->gcm_regid)
                ->send("nuevo pedido",array(
                    "info" => $json
                ));
            return $json;
        }
    }
}

<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function sendPush($json)
    {
        $token="APA91bF2pwcvs1QlAcQM2NGGIBOiT7aJvyTU_eegXjCTTMClsckVkKku31voBwZVcoa-tCShnvqhQfLWkj5IoSwksVh29-luvR-5ZtxhdgSgoxPe7YA6un_kGMcAGdT3ACe8foq2MIWvowTK1tuzb8XqG5b32bt84oT_ZCH6qLR9TDg3ImRtfgs";
        //notification
        PushNotification::app('appNameAndroid')
            ->to($token)
            ->send($json);
        return $json;
    }
}

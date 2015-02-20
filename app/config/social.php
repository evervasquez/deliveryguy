<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => getenv('FACEBOOK_CLIENT_ID'),
            'client_secret' => getenv('FACEBOOK_CLIENT_SECRET'),
            'scope'         => array('email')
        ),


		'Google' => array(
			'client_id'     => getenv('GOOGLE_CLIENT_ID'),
			'client_secret' => getenv('GOOGLE_CLIENT_SECRET'),
			'scope'         => array('userinfo_email', 'userinfo_profile'),
		),

	)

);
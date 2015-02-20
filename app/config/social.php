<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */
    /**
     * Facebook
     */
    'Facebook' => array(
        'id' => getenv('FACEBOOK_CLIENT_ID'),
        'secret' => getenv('FACEBOOK_CLIENT_SECRET')
    ),

    /**
     * Google
     */
    'Google' => array(
        'id' => getenv('GOOGLE_CLIENT_ID'),
        'secret' => getenv('GOOGLE_CLIENT_SECRET')
    )

);
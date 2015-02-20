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
    'facebook' => array(
        'id' => getenv('FACEBOOK_CLIENT_ID'),
        'secret' => getenv('FACEBOOK_CLIENT_SECRET')
    ),

    /**
     * Google
     */
    'google' => array(
        'id' => getenv('GOOGLE_CLIENT_ID'),
        'secret' => getenv('GOOGLE_CLIENT_SECRET')
    )

);
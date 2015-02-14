<?php
namespace domain\api\v1;
use Chrisbjr\ApiGuard\ApiGuardController;

/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 8/02/15
 * Time: 9:46
 */


class UserApiController extends ApiGuardController{

    protected $apiMethods = [
        'all' => [
            'keyAuthentication' => true,
            'level' => 1,
            'limits' => [
                // The variable below sets API key limits
                'key' => [
                    'increment' => '1 hour',
                    'limit' => 100
                ],
                // The variable below sets API method limits
                'method' => [
                    'increment' => '1 day',
                    'limit' => 1000
                ]
            ]
        ],

        'show' => [
            'keyAuthentication' => false
        ]
    ];

    public function all(){
        
    }
}
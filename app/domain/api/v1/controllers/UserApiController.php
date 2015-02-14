<?php
namespace domain\api\v1\controllers;

use Chrisbjr\ApiGuard\ApiGuardController;
use domain\api\v1\transformers\UserTransformer;
use domain\delivery\User\UserRepository;

class UserApiController extends ApiGuardController
{

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

        'showId' => [
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
        ]
    ];

    protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function all()
    {
        return $this->response->withCollection($this->userRepo->all(), new UserTransformer);
    }

    public function showId($id)
    {

    }

    public function login()
    {
        $data = \Input::all();
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validator = \Validator::make($data, $rules);

        if ($validator->passes()) {
            if (\Auth::attempt($data)) {
                return \Auth::user()->email;
                return $this->response->withCollection(\Auth::user(), new UserTransformer);
            }
        } else {
            return $validator->errors();
        }
    }
}
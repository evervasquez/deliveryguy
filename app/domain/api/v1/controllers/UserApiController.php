<?php
namespace domain\api\v1\controllers;

use Chrisbjr\ApiGuard\ApiGuardController;
use domain\api\v1\transformers\UserTransformer;
use domain\delivery\User\UserRepository;
use EllipseSynergie\ApiResponse\Laravel\Response;

class UserApiController extends ApiGuardController
{

    protected $apiMethods = [
        'all' => [
            'keyAuthentication' => false,
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
        ],
        'login' => [
            'keyAuthentication' => false
        ]
    ];

    protected $userRepo;
    public $response;

    function __construct(UserRepository $userRepo, Response $response)
    {
        $this->userRepo = $userRepo;
        $this->response = $response;
    }

    public function all()
    {
        return $this->response->withCollection($this->userRepo->all(), new UserTransformer);
    }

    public function showId($id)
    {

    }

    /**
     * login android and iOS
     * @return \Illuminate\Http\Response|mixed
     */
    public function login()
    {
        $data = \Input::all();
        $rules = [
            'email' => 'required|email',
            'password' => 'required|alpha_dash'
        ];
        $validator = \Validator::make($data, $rules);
        if ($validator->passes()) {
            if (\Auth::attempt($data)) {
                $user = $this->userRepo->findId(\Auth::user()->id);
                return $this->response->withItem($user, new UserTransformer);
            } else {
                //error login
                return $this->response->withArray(array(
                    'code' => 'ERROR',
                    'http_code' => 401,
                    'message' => 'There was an error Login'
                ));
            }
        } else {
            return $this->response->errorInternalError('Internal Error');
        }
    }
}
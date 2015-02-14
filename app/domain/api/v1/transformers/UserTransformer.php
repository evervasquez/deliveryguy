<?php

namespace domain\api\v1\transformers;

use domain\delivery\User\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract{

    public function transform(User $user)
    {
        return $user->email;
        return [
            'id'      => (int) $user->id,
            'title'   => $user->code_user,
            'year'    => $user->email,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/user/'.$user->id,
                ]
            ],
        ];
    }
}
<?php

namespace domain\api\v1\transformers;

use domain\delivery\User\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => (int)$user->id,
            'code' => $user->code_user,
            'email' => $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => '/user/' . $user->id,
                ]
            ],
            'deleted_at' => $user->deleted_at
        ];
    }
}
<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLTyp;

class AuthType extends GraphQLTyp
{
    protected $attributes = [
        'name' => 'Auth',
        'description' => 'to get user details and access token',
    ];

    public function fields() : array
    {
        return [
            'user' => [
                'type' => GraphQL::type('User'),
            ],
            'authorisation' => [
                'type' => GraphQL::type('Token'),
            ]
        ];
    }
}

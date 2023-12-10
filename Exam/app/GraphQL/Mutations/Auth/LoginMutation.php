<?php

namespace App\GraphQL\Mutations\Auth;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use App\Services\Auth\LoginServices;

class LoginMutation extends Mutation
{
    protected $attributes = [
        'name' => 'Login',
    ];

    public function type() : type
    {
        return GraphQL::type('Auth');
    }

    public function args() : array
    {
        return [
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
                'rules' => ['required', 'email'],
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::string(),
                'rules' => ['required', 'string'],
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return (new LoginServices)->login($args);
    }
}

<?php

namespace App\GraphQL\Mutations\Auth;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use App\Services\Auth\SignUpServices;

class SignUpMutation extends Mutation
{
    protected $attributes = [
        'name' => 'signUp'
    ];

    public function type() : Type
    {
        return GraphQL::type('Auth');
    }

    public function args() : array
    {
        return [
            'first_name' => [
                'name' => 'first_name',
                'type' => Type::string(),
                'rules' => ['required', 'string'],
            ],
            'last_name' => [
                'name' => 'last_name',
                'type' => Type::string(),
                'rules' => ['required', 'string'],
            ],
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
            'password_confirmation' => [
                'name' => 'password_confirmation',
                'type' => Type::string(),
                'rules' => ['required', 'string'],
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return (new SignUpServices)->signUp($args);
    }

}

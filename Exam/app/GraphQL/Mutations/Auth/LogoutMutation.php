<?php
namespace App\GraphQL\Mutations\Auth;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class LogoutMutation extends Mutation
{
    protected $attributes = [
        'name' => 'Logout',
    ];

    public function type() : type
    {
        return GraphQL::type('Logout');
    }

    public function resolve($root, $args)
    {
        auth('api')->logout();
        return ['message'=>'signed up successfully'];
    }
}

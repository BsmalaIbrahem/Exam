<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ProfileQuery extends Query
{
    protected $attributes = [
        'name' => 'profile',
    ];


    public function type() : Type
    {
        return GraphQL::type('User');
    }

    public function resolve($root, $args)
    {
        return User::where('id', auth('api')->user()->id)->first();
    }

}

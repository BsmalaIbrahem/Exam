<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLTyp;

class LogoutType extends GraphQLTyp
{
    protected $attributes = [
        'name' => 'Logout',
    ];

    public function fields() : array
    {
        return [
            'message' => [
                'type' => Type::string(),
            ],
        ];
    }
}

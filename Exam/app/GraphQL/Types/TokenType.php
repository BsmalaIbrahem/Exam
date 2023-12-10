<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLTyp;

class TokenType extends GraphQLTyp
{
    protected $attributes = [
        'name' => 'Token',
    ];

    public function fields() : array
    {
        return [
            'token' => [
                'type' => Type::string(),
            ],

            'type' => [
                'type' => Type::string(),
            ],
        ];
    }
}

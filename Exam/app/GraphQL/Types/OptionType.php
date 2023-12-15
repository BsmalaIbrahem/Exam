<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLTyp;

class OptionType extends GraphQLTyp
{
    protected $attributes = [
        'name' => 'Option',
        'description' => 'to get quesiton options',
    ];

    public function fields() : array
    {
        return [
            'body' => Type::string(),
            'is_answer' => Type::boolean(),
        ];
    }
}

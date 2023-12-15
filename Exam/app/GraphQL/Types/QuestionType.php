<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLTyp;

class QuestionType extends GraphQLTyp
{
    protected $attributes = [
        'name' => 'Question',
        'description' => 'to get quesiton',
    ];

    public function fields() : array
    {
        return [
            'body' => Type::string(),
            'grade' => Type::int(),
            'options' => Type::listOf(GraphQL::type('Option')),
        ];
    }
}

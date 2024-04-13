<?php

namespace App\GraphQL\Queries\Exam;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class GetExamsQuery extends Query
{
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Question'));
    }

    public function args(): array
    {
        return [
            'search' => [
                'name' => 'search',
                'type' => Type::string(),
                'rules' => ['nullable', 'string']
            ],
            'user_name' => [
                'name' => 'user_name',
                'type' => Type::string(),
                'rules' => ['nullable', 'string']
            ]
        ];
    }

    public function resolve($root, $args)
    {
    }
}

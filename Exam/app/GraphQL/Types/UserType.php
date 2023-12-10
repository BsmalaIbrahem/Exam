<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLTyp;

class UserType extends GraphQLTyp {
    protected $attributes = [
        'name' => 'User',
        'description' => 'user type',
        'model' => User::class,
    ];

    public function fields () : array{
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'first_name' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }
}

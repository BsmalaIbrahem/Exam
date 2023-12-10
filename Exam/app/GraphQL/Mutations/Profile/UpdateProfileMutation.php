<?php
namespace App\GraphQL\Mutations\Profile;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use App\Services\Profile\ProfileService;

class UpdateProfileMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateProfile',
    ];

    public function type() : Type{
        return Type::string();
    }

    public function args():array
    {
        return [
            'first_name' => [
                'name' => 'first_name',
                'type' => Type::string(),
                'rules' => ['required', 'string']
            ],
            'last_name' => [
                'name' => 'last_name',
                'type' => Type::string(),
                'rules' => ['required', 'string']
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
                'rules' => ['required', 'string'],
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return (new ProfileService)->update($args);
    }
}

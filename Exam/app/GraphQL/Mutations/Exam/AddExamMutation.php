<?php

namespace App\GraphQL\Mutations\Exam;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class AddExamMutation extends Mutation
{
    protected $attributes = [
        'name' => 'addExam',
        'description' => 'add new exam'
    ];

    public function type():type
    {
        return GraphQL::type('Message');
    }

    public function args():array
    {
        return [
            'title'=>[
                'name' => 'title',
                'type' => Type::string(),
                'rules' => ['required', 'string', 'max:255'],
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::string(),
                'rules' => ['required', 'string'],
            ],
            'status' => [
                'name' => 'status',
                'type' => Type::boolean(),
                'rules' => ['required', 'boolean'],
            ],
            'time' => [
                'name' => 'time',
                'type' => Type::int(),
                'rules' => ['required', 'integer'],
            ],
            'grade' => [
                'name' => 'grade',
                'type' => Type::int(),
                'rules' => ['required', 'integer'],
            ],
            'questions' =>[
                'name' => 'questions',
                'type' => Type::listOf(GraphQL::type('Question')),
                'rules' => 'required',
            ]

        ];
    }

    public function resolve($root, $args)
    {
        //
    }
}

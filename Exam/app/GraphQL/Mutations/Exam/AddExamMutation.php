<?php

namespace App\GraphQL\Mutations\Exam;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use App\Services\Exam\ExamService;
use App\GraphQL\Inputs\QuestionInput;

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
                'type' => Type::string(),
                'rules' => ['required'],
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
            'questions' => [
                'type' => Type::listOf(GraphQL::type('QuestionInput')),
                'rules' => ['required']
            ]

        ];
    }

    public function resolve($root, $args)
    {
        (new ExamService)->addExam($args);
        return ['message' => 'successfully created'];
    }
}

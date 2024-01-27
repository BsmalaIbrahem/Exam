<?php

namespace App\Services\Exam;

use App\Models\Exam;

class ExamService
{
    public function addExam($data)
    {
        $this->storeExam($data);

    }

    private function storeExam($data)
    {
        $exam = Exam::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => auth()->user()->id,
            'time' => $data['time'],
            'grade' => $data['grade']
        ]);

        foreach($data['questions'] as $questionData){
            $question = $exam->questions()->create($questionData);
            $question->options()->createMany($questionData['options']);
        }

    }
}

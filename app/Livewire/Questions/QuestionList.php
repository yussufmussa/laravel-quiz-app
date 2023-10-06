<?php

namespace App\Livewire\Questions;

use App\Models\Question;
use Livewire\Component;

use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\Response;
 
class QuestionList extends Component
{
    public function render(): View
    {
        $questions = Question::latest()->paginate();
 
        return view('livewire.questions.question-list', compact('questions'));
    }
 
    public function delete(Question $question): void
    {
        abort_if(! auth()->user()->is_admin, Response::HTTP_FORBIDDEN, '403 Forbidden');
 
        $question->delete();
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function single(Questionnaire $questionnaire)
    {
        // $questionnaire contains our questionnaire object.
        $results = Questionnaire::with(
            [
                'questions' => function ($query) {
                    $query->orderBy('order', 'ASC');
                },

                'questions.answers' => function ($query) {
                    $query->orderBy('order', 'ASC');
                },
            ]
        )
            ->where('slug', '=', $questionnaire->slug)
            ->first();

        return view(
            'questionnaire',
            [
                'data' => $results
            ]
        );
    }

    public function store(Request $request) {
        echo "Questionnaire ID: {$request->input('questionnaire')} <br><br>";

        foreach ($request->input('questions') as $question => $answer) {
            echo "Question {$question} -> Answer {$answer}";
            echo "<br><br>";
        }
    }
}

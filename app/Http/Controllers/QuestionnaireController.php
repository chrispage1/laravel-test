<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;

class QuestionnaireController extends Controller
{
    public function single(Questionnaire $questionnaire)
    {
        // $questionnaire contains our questionnaire object.

        $exec = Questionnaire::with(
            [
                'questions' => function ($query) {
                    $query->orderBy('order', 'ASC');
                }
            ]
        )
        ->get();

        return $exec;
//        return view('questionnaire', ['data' => 'test']); // Add order by 'order' ASC
    }
}

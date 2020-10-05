<?php

use Illuminate\Database\Seeder;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Questionnaire::class, 3)->create()
            ->each(
                function ($questionnaire) {
                    $questionnaire->questions()->savemany(
                        factory(App\Models\Question::class, 5)->make(
                            [
                                'questionnaire_id' => $questionnaire->id,
                            ]
                        )
                    )
                        ->each(
                            function ($question) {
                                $question->answers()->savemany(
                                    factory(App\Models\Answer::class, 3)->make(
                                        [
                                            'question_id' => $question->id,
                                        ]
                                    )
                                );
                            }
                        );
                }
            );
    }
}

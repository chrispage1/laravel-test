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
        factory(App\Models\Questionnaire::class, 3)->create()->each(
            function ($questionnaire) {
                $questionnaire->questions()->savemany(
                    factory(App\Models\Question::class, 10)->make(
                        [
                            'questionnaire_id' => $questionnaire->id,
                        ]
                    )
                );
            }
        );
    }
}

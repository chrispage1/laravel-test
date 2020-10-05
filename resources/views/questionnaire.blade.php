<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $data->name }}</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell text-center title">
                    <strong class="h2 subheader">{{ $data->name }}</strong>
                </div>
            </div>

            <form method="post" action="/questionnaire/submit">
                @csrf
                <input type="hidden" name="questionnaire" value="{{ $data->id }}">

                @foreach($data->questions as $question)
                    <div class="question-container">
                        <div class="grid-x grid-margin-y">
                            <div class="cell small-12 medium-6">
                                <div>
                                    <span class="subheader">Q.{{ $loop->iteration }}</span>
                                </div>
                                <p>{{ $question->question }}</p>
                            </div>

                            <div class="cell small-12 medium-6">
                                @foreach($question->answers as $answer)
                                    <label>
                                        <input type="radio" name="questions[{{ $question->id }}]" value="{{ $answer->id }}">
                                        {{ $answer->answer }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="grid-x">
                    <div class="cell">
                        <input type="submit" class="button expanded" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

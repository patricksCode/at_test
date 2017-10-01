@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Questions of the Day</h4></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="questions">
                        @foreach($userQuestions as $questionNumber  => $userQuestion)
                            @php ($question = $userQuestion->question()->first())
                            <div class="row form-group">
                                <div class="col-md-12 col-xs-12"> {{ ($questionNumber+1) .". " .$question->text}}?</div>
                                @foreach($question->answers()->orderBy('order')->get() as $answer)
                                        <div class="form-check col-md-11 col-xs-11 col-md-offset-1 col-xs-offset-1">
                                            <label class="form-check-label">
                                                <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="question-{{$userQuestion->id}}"
                                                        id="question-{{$userQuestion->id}}"
                                                        value="{{ $userQuestion->id . '::' . $answer->id }}"
                                                        {{ $userQuestion->selected_answer == $answer->id ? 'checked' : '' }}
                                                />
                                                {{ $answer->text }}
                                            </label>
                                        </div>
                                @endforeach
                            </div>
                        @endforeach
                    </form>
                </div>
                <div class="panel-footer text-right">
                    <a class="btn btn-primary resultsButton" href="/graph-results" role="button">See Results</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script>
    var $csrf = '{{ csrf_token() }}';
    </script>

    <script src="{{ asset('js/questions.js') }}"></script>

@endsection


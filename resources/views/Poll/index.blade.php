@extends('layouts.app')

@section('content')
    <stepper-component></stepper-component>
    @if(auth()->user()->survey_made)

        <div class="container">

            <div class="row justify-content-center">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Encuesta realizada</h5>
                        <p class="card-text">Usted ya realizo la encuesta, muchisimas gracias por su colaboracion</p>
                        <a href="{{ route('welcome') }}" class="btn btn-primary">Inicio</a>
                    </div>
                </div>
            </div>

        </div>

    @else

        <form class="form form-group" action="{{ route('poll.made') }}" method="post">
            <ul class="stepper horizontal" id="contentTypeStepper">
                <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                @foreach($stages as $stage)

                    @if($loop->first)
                        <li class="step active" id="step-{{ $loop->iteration }}">
                            <div class="step-title waves-effect"
                                 data-step-label="{{ $stage->description }}">{{ $stage->title }}</div>
                            <div class="step-content">

                                @foreach($stage->questions as $question)
                                    <div class="input-group">
                                        <label for="" class="col-sm-1">{{ strtoupper($question->title) }}</label>

                                        @foreach($question->answers as $answer)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]"
                                                       id="inlineRadio1" value="{{ $answer->id }}">
                                                <label class="form-check-label col-1"
                                                       for="inlineRadio1">{{ $answer->title }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach

                                <div class="step-actions">
                                    <button class="waves-effect waves-dark btn btn-primary next-step" data-feedback="someFunction">SIGUIENTE</button>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="step" id="step-{{ $loop->iteration }}">
                            <div class="step-title waves-effect">{{ $stage->title }}</div>
                            <div class="step-content">
                                @foreach($stage->questions as $question)
                                    <div class="input-group">
                                        <label for="" class="col-form-label">{{ $question->title }}</label>
                                        @foreach($question->answers as $answer)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]"
                                                       id="inlineRadio1" value="{{ $answer->id }}">
                                                <label class="form-check-label"
                                                       for="inlineRadio1">{{ $answer->title }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                                <div class="step-actions">
                                    <!-- Here goes your actions buttons -->
                                    <button class="waves-effect waves-dark btn next-step" data-feedback="someFunction">CONTINUE</button>
                                </div>
                            </div>
                        </li>
                    @endif


                @endforeach

            </ul>

        </form>

    @endif

@endsection

@section('scripts')

    <script>

        function someFunction(destroyFeedback) {

            setTimeout(() => {
                destroyFeedback(true);
            }, 1000);

        }

    </script>

@endsection

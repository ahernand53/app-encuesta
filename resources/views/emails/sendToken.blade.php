@component('mail::message')
# Bienvenido

Gracias por registrase, a continuacion podra realizar la encuesta.

@component('mail::button', ['url' => route('poll.make', [$user->survey_token]) ])
    Realizar encuesta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent


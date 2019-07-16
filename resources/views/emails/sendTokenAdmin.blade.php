@component('mail::message')
# Bienvenido {{ $admin->name }}

Se le ha registrado como administrador, favor de confirmar el correo

@component('mail::button', ['url' => route('usuarios.create', [$admin->token_verification]) ])
    Confirmar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent


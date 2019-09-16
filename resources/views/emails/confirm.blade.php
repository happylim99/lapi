@component('mail::message')
# Hello {{$user->name}}

Please verify your new email :

@component('mail::button', ['url' => route('verify', ['token' => $user->verification_token])])
Verified Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
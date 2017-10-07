@component('mail::message')
# Buen dia, 

The body of your message.

@component('mail::button', ['url' => 'passwords.reset'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

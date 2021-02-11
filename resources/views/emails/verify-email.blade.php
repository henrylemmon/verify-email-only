@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => $signedURL])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

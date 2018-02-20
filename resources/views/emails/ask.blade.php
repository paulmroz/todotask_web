@component('mail::message')
The user:
{{$user->email}} send you a question.

{{$data['title']}}


{{$data['body']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent

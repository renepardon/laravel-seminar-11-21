@component('mail::message')
# New contact request

#### Provided information

@component('mail::table')
|              |               |
| ------------ |:--------------|
| Name         | {{ $name }}   |
| eMail        | {{ $email }}  |
| Phone        | {{ $phone }}  |
| Message:     | s.u:          |
@endcomponent

<div>{{ $message }}</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

<x-mail::message>
# Hello, you have got an enquiry!

<h3>First Name: {{$data['first_name']}}</h3>
<h3>Last Name: {{$data['last_name']}}</h3>
<h3>Email: {{$data['email']}}</h3>
<h3>Message: {{$data['message']}}</h3>
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

<!-- resources/views/emails/customer_notification.blade.php -->
<x-layout>
    <body>
        <h1>Delivery Email from Naiki</h1>
        <p>{{ $data['body'] }}</p>
        <p>Thank you, <br> Naiki Team</p>
    </body>
</x-layout>

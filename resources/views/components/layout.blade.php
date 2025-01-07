<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/LogoNAV.png') }}">
    <title>@yield('title', 'Naiki')</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");

        .col {
            width: 95%;
            margin: auto;
        }

        * {
            font-family: "Inter", Courier, monospace;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body class="overflow-x-hidden pt-16 bg-[#F7F6F3]">

    <x-header />

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <x-footer />

    @vite('resources/js/app.js')
</body>

</html>

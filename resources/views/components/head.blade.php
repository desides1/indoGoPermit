<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ $title }}</title> --}}
    <title>@yield('title', 'Default Title')</title>
    <meta name="description" content="{{ $description }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

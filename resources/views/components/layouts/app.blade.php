@props(['title' => null,])

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    {{-- other meta information for SEO of the video --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>

    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>

    @vite('resources/css/app.css')

    @livewireStyles

    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <style> .plyr iframe[id^=youtube] { top: -50%; height: 200%;}iframe {pointer-events: none;} </style>

    @stack('styles')

</head>
<body class="h-full  flex flex-col">

 {{ $slot}}

 @livewireScripts
 @stack('scripts')
</body>
</html>

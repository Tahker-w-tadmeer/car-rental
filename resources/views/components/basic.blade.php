<!doctype html>
<html class="h-full" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @if(isset($title) && $title)
        <title>{{ $title . " | ". config("app.name") }}</title>
    @else
        <title>{{ config("app.name") }}</title>
    @endif
</head>
<body class="h-full bg-gray-50">

<header class="absolute inset-x-0 top-0 z-50 bg-gray-100">
    <nav class="flex items-center justify-between px-6 py-3 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">{{ config("app.name") }}</span>
                <img class="h-12 w-auto" src="{{ asset("logo.svg") }}" alt="">
            </a>
        </div>
        <div class="flex justify-end items-center space-x-3">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-200 px-3 py-2 rounded">Home</a>
            <div class="flex flex-1 justify-end">
                <?php if(! auth()->check() && "/login" !== $_SERVER["REQUEST_URI"]): ?>
                    <a href="/login" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
                <?php elseif(auth()->check()): ?>
                    <a href="/dashboard" class="text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-200 px-3 py-2 rounded">Dashboard <span aria-hidden="true">&rarr;</span></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

{{ $slot }}

</body>
</html>

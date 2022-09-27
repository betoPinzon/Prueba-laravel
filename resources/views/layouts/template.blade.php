<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Academy</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="icon" type="image/png" href="{{asset('img/FAVICON.png')}}">
</head>
<body>
<header class="relative shadow-lg bg-gray-100 z-10">
    <nav class="w-10/12 mx-auto py-2 flex flex-row justify-between">
        <a class=" w-48  my-0.5 flex items-center" href="{{route('index')}}">
            <img class="" src="{{asset('img/LOGO2.svg')}}">
        </a>
        <ul class="flex gap-10 mr-16 items-center">
            <li>
                <a  class="font-narrow text-lg hover:underline" href="{{route('index')}}">
                    Inicio
                </a>
            </li>
            @auth()
            <li>
                <a  class="font-narrow text-lg hover:underline" href="{{route('dashboard')}}">
                    Dashboard
                </a>
            </li>
            @endauth
        </ul>
    </nav>
</header>
<main class="relative z-0">
    <div class="w-11/12 mx-auto bg-gray-100 py-5">
        @yield('contentIndex')
    </div>
</main>
</body>
</html>

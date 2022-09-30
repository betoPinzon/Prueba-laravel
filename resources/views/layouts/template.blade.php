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
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
</head>
<body>
<header class="relative  w-full shadow-lg z-10">
    <nav class="relative w-full lg:flex lg:justify-between lg:w-11/12 lg:m-auto lg:items-center">
        <div class="flex items-center justify-between">
            <button id="buton" class="lg:hidden rounded bg-slate-200 shadow-sm w-8 h-8 ml-3.5 flex flex-col items-center justify-center">
                <svg id="iconMenu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-slate-700 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-6 h-6 text-red-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <a class="w-36 mr-4 lg:w-48  my-0.5 flex items-center" href="{{route('index')}}">
                <img class="py-1" alt="Logo" src="{{asset('img/LOGO2.svg')}}">
            </a>
        </div>
        <div id="menu" class="absolute bg-gray-200 w-full hidden lg:block lg:relative lg:w-auto lg:mr-5">
            <ul class="ml-3.5  lg:ml-auto font-narrow text-lg">
                <li>
                    <a href="" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="ml-1">Inicio</p>
                    </a>
                </li>
                @auth()
                <li class="mt-1 pb-2">
                    <a href="" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                        </svg>
                        <p class="ml-1">Dashboard</p>
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
<main class="relative z-0">
    <div class="w-11/12 mx-auto bg-gray-100 py-5">
        @yield('contentIndex')
    </div>
</main>
<script src="{{asset('js/template.js')}}" ></script>
</body>
</html>

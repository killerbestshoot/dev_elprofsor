<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title ?? 'Example Website' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/eb9abd5ec9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Damion&family=Gloria+Hallelujah&family=Merienda:wght@500;800&family=Rock+Salt&display=swap');
    </style>
</head>
<body class="bg-black flex flex-col justify-center min-h-screen">
{{ $slot }}
<footer class="h-4/5 text-white border-t-2 border-white flex flex-col justify-center items-center w-full p-4">
    <div class="h-5/6 w-1/5 mx-auto  p-2 mb-10  mt-6">
        <h3 class=" p-4 font-serif text-center text-2xl font-bold">
            Rezo sosyal Nou yo
        </h3>
        <ul class="h-5/6 p-4 font-sans flex flex-col justify-between">
            <li class="flex items-center justify-center m-2 p-1">
                <i class="fa-brands fa-square-x-twitter fa-2xl w-1/4 text-center hover:fade"></i>
                <a class="w-3/4 text-center text-2xl" href="https://x.com/Elprofesorcomun?t=Jd-C0fqbUgN2sD5GvDc7EQ&s=09">X</a>
            </li>
            <li class="flex items-center justify-center m-2 p-1">
                <i class="fab fa-instagram fa-2xl w-1/4 text-center hover:spin"></i>
                <a class="w-3/4 text-center text-2xl" href="https://instagram.com/el_profesor245?igshid=NGExMmI2YTkyZg==">Instagram</a>
            </li>
            <li class="flex items-center justify-center m-2 p-1">
                <i class="fa-brands fa-telegram fa-2xl w-1/4 text-center hover:bounce"></i>
                <a class="w-3/4 text-center text-2xl" href="https://t.co/7AGZVX4Dwf">Telegram</a>
            </li>
            <li class="flex items-center justify-center m-2 p-1">
                <i class="fa-brands fa-youtube fa-2xl hover:shake w-1/4 text-center"></i>
                <a class="w-3/4 text-center text-2xl" href="https://www.youtube.com/@comonutty">Youtube</a>
            </li>
        </ul>
    </div>
    <hr class="border-t-2 w-3/4 mx-auto border-white mb-10" />

    © 2023 el_profsor community
</footer>
</body>
</html>

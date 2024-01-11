@extends("layouts/welcome-box")

@yield:main;
<div class="text-center">
    <h1 class="fontPTSerif text-3xl">Marcsi büfé</h1>
    <p class="text-gray-500 mt-2 mb-5">Rendelj online vagy valamxi random szöveg</p>
    @render($app, 'button-link', ['title' => 'Bejelentkezés'], ['href' => $app->baseUrl . 'auth/login.php'])
</div>
@endyield:main;
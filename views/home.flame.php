@extends("layouts/welcome-box")

@yield:main;
<div class="text-center">
    <h1 class="fontPTSerif text-3xl">Marcsi büfé</h1>
    <p class="text-gray-500 mt-2 mb-5">Marcsi Büfé a Suliban: Friss energiával, ízletes összhangban!</p>
    @if(!$app->auth->isLoggedIn())
        @render($app, 'button-link', ['title' => 'Bejelentkezés'], ['href' => $app->baseUrl . 'auth/login.php'])
    @else:
        @render($app, 'button-link', ['title' => 'Vásárlás'], ['href' => $app->baseUrl . 'products.php'])
    @endif
</div>
@endyield:main;
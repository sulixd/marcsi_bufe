@extends("layouts/welcome-box")

@yield:main;
<div class="text-center">
    <h1 class="fontPTSerif text-3xl mb-5">Bejelentkezés</h1>
    @render($app, 'button-link', ['title' => 'Bejelentkezés Google-al'], ['href' => $app->oauth->createUrl()])
</div>
@endyield:main;
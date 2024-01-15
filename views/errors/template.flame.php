@extends("layouts/welcome-box")

@yield:main;
<div class="text-center">
    <h1 class="fontPTSerif text-3xl text-red-400">{{$title}}</h1>
    <p class="text-gray-500 mt-2 mb-3">Upsz, úgy néz ki valami nem a terv szerint sikerült... 😟</p>
    @render($app, 'button-link', ['title' => 'Vissza a főoldalra'], ['href' => $app->baseUrl])
</div>
@endyield:main;
@extends("layouts/welcome-box")

@yield:main;
<div class="text-center">
    <h1 class="fontPTSerif text-3xl">Sikeres megrendelés</h1>
    <p class="text-gray-500 mt-2 mb-5">A rendelésed sikeresen leadásra került</p>
    @render($app, 'button-link', ['title' => 'Tovább vásárolok'], ['href' => $app->baseUrl . 'products.php'])
</div>
@endyield:main;
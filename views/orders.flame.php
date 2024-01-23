@extends("layouts/layout")

@yield:main;
<div class="md:max-w-screen-md lg:max-w-screen-lg px-3 lg:px-0 mx-auto mt-24 mb-10">
    <h1 class="fontPTSerif text-3xl mb-4">Rendelések</h1>
    @if(!empty($orders))
    <div>
        @foreach($orders as $index => $order):
            @render($app, 'order', compact('order'))
        @endforeach
    </div>
    <div class="my-3 flex space-x-3 items-center justify-center">
        <a class="text-blue-400 underline" href="{{ $backUrl }}">Vissza</a>
        <a class="text-blue-400 underline" href="{{ $nextUrl }}">Következő oldal</a>
    </div>
    @else:
    <div class="bg-gray-100 text-center py-5 px-5 border-2 md:w-1/3 md:mx-auto">
        <h2 class="fontPTSerif mb-2 text-2xl">Jelenleg nincs rendelés</h2>
    </div>
    @endif
</div>
@endyield:main;
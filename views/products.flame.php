@extends("layouts/layout")

@yield:main;
<div class="md:max-w-screen-md lg:max-w-screen-lg px-3 lg:px-0 mx-auto mt-24 mb-10">
    <h1 class="fontPTSerif text-3xl mb-4">Termékek</h1>
    <div class="md:grid md:grid-cols-2 lg:grid-cols-3 gap-3 my-3 md:my-0">
        @foreach($products as $product)
            <div class="bg-gray-100 border-2 border-gray-200 flex flex-1 flex-col justify-between">
                <img class="w-full" src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                <div class="px-5 py-2 pb-3 mt-auto">
                    <h3 class="text-xl fontPTSerif">{{ $product['name'] }}</h3>
                    <p>
                        Ár: {{ $product['price'] }}Ft
                    </p>
                    <hr class="my-3" />
                    @render($app, 'button', ['title' => 'Kosárhoz adás'], ['id' => 'prod_buy_btn__' . $product['id'], 'onclick' => "addToCart($product[id], '$app->baseUrl')"])
                </div>
            </div>
        @endforeach
        @if(empty($products))
        <div class="bg-gray-100 px-5 py-2 pb-3 border-2 text-center">
            <h3 class="fontPTSerif text-3xl mb-4">Nem található termék</h3>
            @render($app, 'button-link', ['title' => 'Előző oldal'], ['href' => $backUrl])
        </div>
        @endif
    </div>
    <div class="my-3 flex space-x-3 items-center justify-center">
        <a class="text-blue-400 underline" href="{{ $backUrl }}">Vissza</a>
        <a class="text-blue-400 underline" href="{{ $nextUrl }}">Következő oldal</a>
    </div>
</div>

<script defer="defer" async src="{{ $app->baseUrl }}js/axios.js"></script>
<script defer="defer" async src="{{ $app->baseUrl }}js/cart.js"></script>
@endyield:main;
<div class="bg-gray-100 py-5 px-5 border-2 my-2">
    <div>
        <h2 class="text-xl fontPTSerif">Rendelő email címe: {{ $order['user_email'] }}</h2>
        <h3 class="text-lg fontPTSerif mt-2">Rendelt termékek:</h3>
        <p>
            Ekkor rendelve: {{ $product['order_date'] ?? 'Ismeretlen' }}
            <br/>Átvétel a(z) {{ $order['break'] }} szünetben
        </p>
        {{* $priceCount = 0 }}
        @foreach(yieldProducts(explode(',', $order['product_ids'])) as $product)
            {{* $priceCount += $product['price'] }}
            <div class="bg-white py-5 px-5 border-2 flex items-center my-2">
                <img class="rounded-lg w-[50px] md:w-[75px]" src="{{ $product['image'] }}" alt="{{ $item['name'] }} Image">
                <div class="mx-3">
                    <h2 class="text-lg fontPTSerif">{{ $product['name'] }}</h2>
                    <p class="text-gray-700">{{ $product['price'] }}Ft</p>
                </div>
            </div>
        @endforeach
        <div>
            <p class="text-lg fontPTSerif">Összesen: {{ $priceCount }}Ft</p>
        </div>
    </div>
</div>
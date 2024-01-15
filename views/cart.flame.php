@extends("layouts/layout")

@yield:main;
<div class="md:max-w-screen-md lg:max-w-screen-lg px-3 lg:px-0 mx-auto mt-24 mb-10">
     <h1 class="fontPTSerif text-3xl mb-4">Kosár</h1>
     @if(!empty($items))
     <div>
          @foreach($items as $index => $item):
               @render($app, 'cart-item', compact('item', 'index'))
          @endforeach
          <div class="mt-5 border-4 border-t-orange-400 border-r-orange-400 border-b-orange-300 border-l-orange-300 bg-gray-200 px-5 py-3">
               <h3 class="fontPTSerif text-2xl">Összesen: {{ $price }}Ft</h3>
               <form class="mt-2" method="post" action="{{ $app->baseUrl }}cart_order.php">
                    <label for="break_input">Melyik szünetre szeretnéd? (1-7)</label>
                    <input 
                         id="break_input"
                         class="px-5 py-2 w-full border-2 border-orange-400 mt-2 mb-2"
                         placeholder="Szünet, pl: 2. (9:40 - 9:55)" name="break" type="number" min="1" max="7" />
                         @render($app, 'button', ['title' => 'Megrendelés'], ['type' => 'submit'])
               </form>
          </div>
     </div>
     @else:
     <div class="bg-gray-100 text-center py-5 px-5 border-2 md:w-1/3 md:mx-auto">
          <h2 class="fontPTSerif mb-2 text-2xl">A kosara üres</h2>
          @render($app, 'button-link', ['title' => 'Vásárlás'], ['href' => $app->baseUrl . 'products.php'])
     </div>
     @endif
</div>
@endyield:main;
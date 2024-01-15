<div class="bg-gray-100 py-5 px-5 border-2 flex items-center my-2">
     <img class="rounded-lg w-[50px] md:w-[75px]" src="{{ $item['image'] }}" alt="{{ $item['name'] }} Image">
     <div class="mx-3">
          <h2 class="text-lg fontPTSerif">{{ $item['name'] }}</h2>
          <p class="text-gray-700">{{ $item['price'] }}Ft</p>
     </div>
     <div class="ml-auto">
          <form method="post" action="{{ $app->baseUrl }}cart_delete.php?id={{ $item['id'] }}">
          <button class="px-4 py-2 bg-red-400 text-white rounded">
               Törlés
          </button>
          </form>
     </div>
</div>
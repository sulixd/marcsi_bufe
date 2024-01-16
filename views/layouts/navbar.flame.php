<nav class="bg-white w-full z-20 top-0 left-0 border-b fixed">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/#" class="flex items-center">
      Marcsi büfé
    </a>
    <div class="flex md:order-2">
      @render($app, 'button-link', ['title' => renderCb($app, $app->auth->isLoggedIn() ? 'icons/cart.svg' : 'icons/auth.svg')], ['href' => $app->auth->isLoggedIn() ? $app->baseUrl . 'cart.php' : $app->baseUrl . 'auth/login.php'])
      <button onclick="document.querySelector('#menu-dropdown').classList.toggle('hidden')" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-700 rounded-lg md:hidden bg-gray-100 hover:bg-gray-50 focus:bg-gray-200 mx-2">
        <span class="sr-only">Menü kinyitása</span>
        {{ render($app, 'icons/menu.svg') }}
      </button>
    </div>
    <div id="menu-dropdown" class="items-center justify-between w-full md:flex md:w-auto md:order-1 hidden">
      <ul class="flex flex-col md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 p-1">
        <li>
          <a href="{{ $app->baseUrl }}products.php" class="block py-2 pl-3 pr-4 text-gray-400 rounded-lg hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-600 md:p-0">Termékek</a>
        </li>
        @if($app->auth->isLoggedIn())
        <li>
          <a href="{{ $app->baseUrl }}auth/logout.php" class="block py-2 pl-3 pr-4 text-gray-400 rounded-lg hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-600 md:p-0">Kijelentkezés</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
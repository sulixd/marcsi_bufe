@extends("layouts/layout")

@yield:main;
<div class="min-h-screen h-auto overflow-hidden bg-div flex">
     <div class="m-auto z-10 sm:px-0 max-w-sm w-[95%] md:w-full">
          <div class="py-5 px-3 bg-white">
               @section:main;
          </div> 
     </div>
</div>
@endyield:main;
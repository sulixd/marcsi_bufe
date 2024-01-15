<a {{ isset($attrs) && is_array($attrs) ? htmlAttributes($attrs) : '' }} class="bg-orange-400 rounded px-10 py-2.5 text-white w-full block">
     {{ renderTitle($title) }}
</a>
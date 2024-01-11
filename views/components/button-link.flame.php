<a {{ isset($attrs) && is_array($attrs) ? htmlAttributes($attrs) : '' }} class="bg-green-400 rounded px-10 py-2.5 text-white w-full block">
     {{ renderTitle($title) }}
</a>
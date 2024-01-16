<?php

function render(App $app, string $name, array $props = [], array $attrs = []) {
     return $app->render->view('components/' . $name, [...$props, 'attrs' => $attrs, 'app' => $app]);
}

function renderCb(App $app, string $name, array $props = [], array $attrs = []) {
     return fn() => render($app, $name, $props, $attrs);
}

function htmlAttributes(array $attrs): string {
     $out = '';
     foreach($attrs as $key => $value) {
          $out .= ' ' . $key . '="' . $value . '"';
     }
     return $out;
}

function renderTitle(string|callable $title) {
     if(is_string($title)) return $title;
     return $title();
}

function yieldProducts(array $ids) {
     foreach($ids as $id) {
          $data = DB::_select('select * from products where id = ? limit 1', [$id], [0]);
          yield $data;
     }
}
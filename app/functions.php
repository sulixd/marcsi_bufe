<?php

function render(App $app, string $name, array $props = [], array $attrs = []) {
     return $app->render->view('components/' . $name, [...$props, 'attrs' => $attrs]);
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
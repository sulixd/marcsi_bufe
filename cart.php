<?php

/** @var App $app */
$app = require_once __DIR__ . '/app/app.php';

$app->auth->middleware();

$productIds = $_SESSION['Cart.Products'] ?? [];

$products = [];

$price = 0;

if(!empty($productIds)) {
     $query = 'select * from products where id in (';
     foreach($productIds as $k => $id) {
          $query .= '?';
          if(array_key_last($productIds) != $k) $query .= ', ';
     }
     $query .= ')';

     $query_result = $app->db->_select($query, $productIds);
     if(isset($query_result['error'])) $app->errorService->ServerError();

     foreach($productIds as $key => $prodId) {
          $prod = array_filter($query_result, fn($r) => $r['id'] == $prodId);
          if(isset($prod[0])) {
               $products[] = $prod[0];
               $price += $prod[0]['price'];
          }
     }
}

$app->render->view('cart', [
     'app' => $app,
     'items' => $products,
     'price' => $price,
]);
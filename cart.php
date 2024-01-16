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

     foreach($productIds as $prodId) {
          foreach($query_result as $res) {
               if($res['id'] == $prodId) {
                    $products[] = $res;
                    $price += $res['price'];
                    break;
               }
          }
     }
}

$app->render->view('cart', [
     'app' => $app,
     'items' => $products,
     'price' => $price,
]);
<?php

$app = require_once __DIR__ . '/app/app.php';

// $app->auth->middleware();

$products = $app->orderService->products(15, isset($_GET['page']) ? intval($_GET['page']) : 1);

$app->render->view('products', [
     'app' => $app,
     'products' => $products
]);
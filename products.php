<?php

$app = require_once __DIR__ . '/app/app.php';

$app->auth->middleware();

$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

$products = $app->orderService->products(6, $currentPage);

$app->render->view('products', [
     'app' => $app,
     'products' => $products,
     'backUrl' => $app->baseUrl . 'products.php?page=' . ($currentPage-1 != 0 ? $currentPage-1 : 1),
     'nextUrl' => $app->baseUrl . 'products.php?page=' . $currentPage+1,
]);
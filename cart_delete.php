<?php

/** @var App $app */
$app = require_once __DIR__ . '/app/app.php';

$app->auth->middleware();

$productIds = $_SESSION['Cart.Products'] ?? [];

if(isset($_GET['index']) && in_array(intval($_GET['index']), array_keys($productIds))) {
    unset($productIds[intval($_GET['index'])]);
    $_SESSION['Cart.Products'] = [...$productIds];
}

header("Location: " . $app->baseUrl . 'cart.php');
exit;
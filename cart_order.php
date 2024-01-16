<?php

/** @var App $app */
$app = require_once __DIR__ . '/app/app.php';

$app->auth->middleware();

if($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST['break']) || !is_numeric($_POST['break']) || intval($_POST['break']) < 1 || intval($_POST['break']) > 7) $app->errorService->BadRequest();

if(!isset($_SESSION['Cart.Products']) || empty($_SESSION['Cart.Products'])) {
    header('Location: ' . $app->baseUrl . 'cart.php');
    exit;
}

$userId = $app->auth->user['id'];

$app->db->insert('orders', [
    'user_id' => $userId,
    'break' => intval($_POST['break']),
]);

$order = $app->db->_select('select id from orders where user_id = ? order by id desc limit 1', [$userId], [0]);

foreach($_SESSION['Cart.Products'] as $productId) {
    $err = $app->db->insert('product_order', [
        'order_id' => $order['id'],
        'product_id' => $productId,
    ]);
}

unset($_SESSION['Cart.Products']);

header('Location: ' . $app->baseUrl . 'checkout_success.php');
exit;
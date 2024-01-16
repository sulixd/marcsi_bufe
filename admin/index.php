<?php

/** @var App $app */
$app = require_once __DIR__ . '/../app/app.php';

$app->auth->middleware(fn($user): bool => $user['is_admin']);

$orders = $app->db->_select('
    SELECT 
        orders.break AS break,
        users.email AS user_email,
        GROUP_CONCAT(products.id) AS product_ids
    FROM orders
        INNER JOIN users 
            ON orders.user_id = users.id
        INNER JOIN product_order
            ON product_order.order_id = orders.id
        INNER JOIN products
            ON products.id = product_order.product_id
    GROUP BY orders.id
');

$app->render->view('orders', [
    'app' => $app,
    'orders' => $orders,
]);
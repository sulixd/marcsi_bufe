<?php

/** @var App $app */
$app = require_once __DIR__ . '/../app/app.php';

$app->auth->middleware(fn($user): bool => $user['is_admin']);

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 5;
if($page == 0) $page++;
$offset = $limit * ($page - 1);


$orders = $app->db->_select('
    SELECT 
        orders.break AS break,
        product_order.created_at AS order_date,
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
    ORDER BY orders.id DESC
    LIMIT ' . $limit . ' OFFSET ' . $offset . '
');

$app->render->view('orders', [
    'app' => $app,
    'orders' => $orders,
    'backUrl' => $app->baseUrl . 'admin/?page=' . ($page-1 != 0 ? $page-1 : 1),
    'nextUrl' => $app->baseUrl . 'admin/?page=' . $page+1,
]);
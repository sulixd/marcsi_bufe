<?php

$app = require_once __DIR__ . '/app/app.php';

if(!isset($_SESSION['Cart.Products'])) $_SESSION['Cart.Products'] = [];

if(isset($_GET['id'])) {
    $exists = $app->db->exists('products', [
        'id' => intval($_GET['id'])
    ]);
    $_SESSION['Cart.Products'][] = intval($_GET['id']);
    echo "OK";
} else echo "FAILED";
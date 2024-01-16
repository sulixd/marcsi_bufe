<?php

/** @var App $app */
$app = require_once __DIR__ . '/app/app.php';

if(!isset($_SESSION['Cart.Products'])) $_SESSION['Cart.Products'] = [];

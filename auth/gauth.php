<?php

$app = require_once __DIR__ . '/../app/app.php';

if(!(!isset($_GET['code']) && !empty($_GET['code']))) {
     header('Location: ' . $app->baseUrl);
     exit;
}

$data = $app->oauth->verify($_GET['code']);

var_dump($data);
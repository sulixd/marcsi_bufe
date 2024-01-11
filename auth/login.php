<?php

$app = require_once __DIR__ . '/../app/app.php';

if($app->auth->isLoggedIn()) {
     header("Location: " . $app->baseUrl);
     exit;
}

$app->render->view('auth', [
     'app' => $app,
]);
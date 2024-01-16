<?php

/** @var App $app */
$app = require_once __DIR__ . '/app/app.php';

$app->auth->middleware();

$app->render->view('checkout_success', [
    'app' => $app
]);
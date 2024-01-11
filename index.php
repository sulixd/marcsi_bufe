<?php

$app = require_once __DIR__ . '/app/app.php';

$app->render->view('home', [
     'app' => $app
]);
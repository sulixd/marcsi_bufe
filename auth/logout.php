<?php

$app = require_once __DIR__ . '/app/app.php';

session_destroy();

header("Location: " . $app->baseUrl);
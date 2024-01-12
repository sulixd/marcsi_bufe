<?php

$app = require_once __DIR__ . '/../app/app.php';

if(!isset($_GET['code'])) {
     header('Location: ' . $app->baseUrl);
     exit;
}

$email = $app->oauth->verify($_GET['code']);

if($email == false) $app->errorService->Unauthorized();

$user = $app->db->_select('select * from users where email = ?', [$email], [0]);

if(isset($user['error'])) {
     $app->db->insert('users', [
          'email' => $email,
          'is_admin' => false,
     ]);
}

$app->auth->loginByEmail($email);

header('Location: ' . $app->baseUrl);

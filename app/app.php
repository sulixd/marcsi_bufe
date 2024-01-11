<?php

use Cache\Views\Flame\FlameRender;

foreach([
     'flame_render_engine/app',
     'db',
     'auth',
     'services/google',
     'services/order',
     'functions',
] as $file) require_once __DIR__ . '/' . $file . '.php';

class App {
     public readonly string $baseUrl;
     public readonly FlameRender $render;
     public readonly array $request;
     public readonly DB $db;
     public readonly Auth $auth;
     public readonly GoogleOAuth $oauth;
     public readonly OrderService $orderService;

     public function __construct() {
          $this->session();
          DB::createConnection(require __DIR__ . '/../config/db.php');
          $this->db = new DB;
          $this->baseUrl = '';
          $this->render = new FlameRender();
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
               $this->request = $_POST;
          }
          $this->auth = new Auth($this);
          $gconf = require __DIR__ . '/../config/google_oauth.php';
          $this->oauth = new GoogleOAuth(
               $gconf['client_id'],
               $gconf['client_secret'],
               $gconf['redirect_uri'],
               $gconf['version'],
          );
          $this->orderService = new OrderService($this->db, $this->auth);
     }

     public function session(): void {
          session_name('Marcsi_SID');
          session_start();
          session_regenerate_id(true);
     }

}

return new App;
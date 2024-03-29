<?php

class Auth {
     private App $app;
     private ?int $userId = NULL;
     public readonly array $user;

     public function __construct(App $app) {
          $this->app = $app;
          if(isset($_SESSION['Auth.UserId'])) {
               $this->userId = intval($_SESSION['Auth.UserId']);
               $this->loginById();
          }
     }

     public function loginById(): void {
          $data = $this->app->db->_select('select * from users where id = ? limit 1', [$this->userId], [0]);
          if(!isset($data['error'])) {
               $this->user = $data;
               $_SESSION['Auth.UserId'] = $data['id'];
          } else $this->user = [];
     }

     public function loginByEmail(string $email) {
          $data = $this->app->db->_select('select * from users where email = ? limit 1', [$email], [0]);
          if(!isset($data['error'])) {
               $this->user = $data;
               $_SESSION['Auth.UserId'] = $data['id'];
          } else $this->user = [];
     }

     public function isLoggedIn(): bool {
          return $this->userId != 0 && $this->user != [];
     }

     public function middleware(?callable $cb = NULL) {
          if($this->userId == NULL || $this->userId == 0) {
               header('Location: ' . $this->app->baseUrl . 'auth/login.php');
               exit;
          } else if(is_callable($cb) && !$cb($this->user)) {
               header('Location: ' . $this->app->baseUrl);
               exit;
          }
     }
}
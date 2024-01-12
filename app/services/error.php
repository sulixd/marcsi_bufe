<?php

use Cache\Views\Flame\FlameRender;

class ErrorService {
     public function __construct(
          private App $app
     ) {}

     public function ServerError() {
          http_response_code(500);
          $this->app->render->view('errors/template', ['title' => 'Szerveroldali hiba', 'app' => $this->app]);
          exit;
     }

     public function Unauthorized() {
          http_response_code(401);
          $this->app->render->view('errors/template', ['title' => 'Hitelesítési hiba', 'app' => $this->app]);
          exit;
     }
}
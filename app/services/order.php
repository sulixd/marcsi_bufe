<?php

class OrderService {

     public function __construct(
          private App $app,
          private Auth $auth
     ) {}

     public function products($limit = 5, $page = 1) {
          if($page == 0) $page++;
          $offset = $limit * ($page - 1);
          $products = $this->app->db->_select('select * from products limit ' . $limit . ' offset ' . $offset);
          if(isset($products['error'])) $this->app->errorService->ServerError();
          return $products;
     }

}
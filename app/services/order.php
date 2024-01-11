<?php

class OrderService {

     public function __construct(
          private DB $db,
          private Auth $auth
     ) {}

     public function products($limit = 5, $page = 1) {
          if($page == 0) $page++;
          $offset = $limit * ($page - 1);
          return $this->db->_select('select * from products limit ' . $limit . ' offset ' . $offset);
     }

}
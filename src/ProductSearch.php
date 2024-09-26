<?php

namespace oldspice;

use oldspice\Product;
use \Exception;

class ProductSearch extends Product {
  public function __construct() {
    parent::__construct();
  }
  public function getResult( $search_query ) {
    $query = "
    SELECT
    @pid := product.product_id as product_id,
    name,
    description,
    price,
    ( SELECT @img_id := image_id FROM product_image WHERE product_id = @pid LIMIT 1 ) as image_id,
    ( SELECT image_file_name FROM image WHERE image_id = @img_id ) as image
    FROM product
    WHERE 
    name LIKE ?
    OR
    description LIKE ?
    AND
    active = 1
    ";
    //pad the search query with %query%
    $param = "%$search_query%";
    $statement = $this -> connection -> prepare( $query );
    $statement -> bind_param('ss', $param, $param );
    $statement -> execute();
    $result = $statement -> get_result();
    $search_result = array();
    while( $row = $result -> fetch_assoc() ) {
      array_push( $search_result, $row );
    }
    return $search_result;
  }
}

?>
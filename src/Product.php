<?php
namespace oldspice;

use oldspice\Database;
use \Exception;

class Product extends Database {
  public function __construct() {
    parent::__construct();
  }

  public function getProducts() {
    $query = "
    SELECT
    @pid := product.product_id as product_id,
    name,
    description,
    price,
    ( SELECT @img_id := image_id FROM product_image WHERE product_id = @pid LIMIT 1 ) as image_id,
    ( SELECT image_file_name FROM image WHERE image_id = @img_id ) as image
    FROM product
    ";

    if( isset($_GET['category_id']) ) {
      $query = $query . " INNER JOIN product_category ON product_category.product_id = product.product_id ";
    }

    $query = $query . " WHERE product.active = 1 ";

    if( isset($_GET['category_id']) ) {
      $query = $query . " AND product_category.category_id = ? ";
    }

    try{
      $statement = $this -> connection -> prepare( $query );
      if( isset($_GET['category_id'] ) ) {
        $statement -> bind_param('i', $_GET['category_id'] );
      }
      if( $statement -> execute() == false ){
        throw new Exception("query failed to execute");
      }
    }
    catch( Exception $exc ){
      echo $exc;
    }
    $result = $statement -> get_result();
    // product array
    $products = array();
    $items = array();
    // loop through result and add to array
    while( $row = $result -> fetch_assoc() ) {
      array_push( $items, $row );
    }
    $products['total'] = count( $items );
    $products['items'] = $items;
    
    return $products;
  }
}
?>
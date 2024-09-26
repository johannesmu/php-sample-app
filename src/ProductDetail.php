<?php
namespace oldspice;

use oldspice\Product;
use \Exception;

class ProductDetail extends Product {
  public function __construct() {
    parent::__construct();
  }
  public function getDetail( $product_id ) {
    $query = "
    SELECT 
    @pid := product_id as product_id,
    name,
    description,
    price,
    ( SELECT quantity FROM product_quantity WHERE product_id=@pid ) as quantity
    FROM product
    WHERE product_id = ?
    ";
    $statement = $this -> connection -> prepare( $query );
    // i=integer, s=string, d=double(float), b=blob
    $statement -> bind_param( 'i', $product_id );
    try {
      if( $statement -> execute() == false ){
        throw new Exception('query error');
      }
      else {
        $result = $statement -> get_result();
        $product_detail = $result -> fetch_assoc();
        $product_images = $this -> getProductImages( $product_id );
        $response = array();
        $response['product'] = $product_detail;
        $response['images'] = $product_images;
        return $response;
      }
    }
    catch( Exception $exc ){
      error_log( $exc -> getMessage() );
      return false;
    }
  }

  public function getProductImages( $product_id ) {
    $query = "
    SELECT
    image_file_name AS image 
    FROM product_image
    INNER JOIN image
    ON product_image.image_id = image.image_id
    WHERE product_id = ?
    ";

    try {
      $statement = $this -> connection -> prepare( $query );
      if( $statement == false ) {
        throw new Exception('query error');
      }
      $statement -> bind_param( 'i' , $product_id );
      if( $statement -> execute() == false ) {
        throw new Exception('execute error');
      }
      else{
        // array for images
        $images = array();
        $result = $statement -> get_result();

        while( $image = $result -> fetch_assoc() ) {
          array_push( $images, $image['image'] );
        }

        return $images;
      }
    }
    catch( Exception $exc ) {
      error_log( $exc -> getMessage() );
      return false;
    }
  }
}
?>
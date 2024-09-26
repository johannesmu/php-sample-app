<?php
namespace oldspice;

use oldspice\Database;
use \Exception;

class Category extends Database {
  public $categories = array();

  public function __construct() {
    parent::__construct();
  }

  public function getCategories() {
    $query = "SELECT category_id, category_name 
    FROM category 
    WHERE active=1 
    ORDER BY category_id ASC";

    try {
      $statement = $this -> connection -> prepare($query);
      if ( $statement == false ) {
        throw new Exception('query error');
      }
    }
    catch( Exception $exc ) {
      error_log( $exc -> getMessage() );
    }

    try {
      if( $statement -> execute() == false ) {
        throw new Exception('execute error');
      }
    }
    catch( Exception $exc ) {
      error_log( $exc -> getMessage() );
    }

    // get the result of the query
    $result = $statement -> get_result();

    // render result as an array
    $category_items = array();
    while( $row = $result -> fetch_assoc() ) {
      array_push( $category_items , $row );
    }
    $active = $this -> getActiveCategory();
    $this -> categories['items'] = $category_items;
    $this -> categories['active'] = $active;
    // return the categories array
    return $this -> categories;
  }

  private function getActiveCategory() {
    return ( isset($_GET['category_id']) ) ? $_GET['category_id'] : null;
  }
}
?>
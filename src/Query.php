<?php
/* a separate class to perform simple queries and return the result */
namespace oldspice;

use oldspice\Database;
use \Exception;

class Query extends Database {
  private $query_string;
  private $query_type;
  private $allowed_query_types = array('select','update','insert','delete');
  private $query_params = array();
  private $response = array();
  private $errors = array();
  private $data = array();


  public function __construct( $query_string ) {
    // construct the parent class (Database) to create $this -> connection
    parent::__construct();
    // store the query string
    $this -> query_string = $query_string;
    $this -> query_type = $this -> detectQueryType( $this -> query_string );
  }

  // this function takes an array as parameter and is called to execute the query

  public function execute( Array $params = array() ) {
    
    // check if the query type is known / allowed
    try {
      if ( $this -> query_type == false ) {
        throw new Exception('query type not recognised');
      }
    }
    catch ( Exception $exc ) {
      $this -> errors['query'] = $exc -> getMessage();
      return $this -> respond( false);
    }

    try {
      if ( $this -> verifyParams( $params ) == false ) {
        throw new Exception('parameters supplied do not match query requirements');
      }
    }
    catch ( Exception $exc ) {
      $this -> errors['parameter'] = $exc -> getMessage();
      return $this -> respond( false);
    }

    try{
      $statement = $this -> connection -> prepare($this -> query_string);
      if ( !$statement ) {
        throw new Exception( $this -> connection -> error );
      }
      if ( count($params) > 0 ) {
        // build the parameter string, eg iii
        $param_string = $this -> buildParamString( $params );
        $statement -> bind_param( $param_string, ...$params );
      }
      if ( $statement -> execute() == false ) {
        throw new Exception('query' . $this -> connection -> error );
      }
    }
    catch( Exception $exc ) {
      $this -> errors['number'] = $this -> connection -> errno;
      $this -> errors['execution'] = $exc -> getMessage();
      return $this -> respond( false);
    }
    // get the result if the query is select
    
    if ( $this -> query_type == 'select' ) {
      $result = $statement -> get_result();
      // add result to $this -> data
      while( $row = $result -> fetch_assoc() ) {
        array_push( $this -> data, $row );
      }
    }
    return $this -> respond( true );
  }

  public function detectQueryType( String $string ) {
    // determine the query type eg select insert update or delete
    // trim spaces from beginning and end of query and convert to lowercase
    $lc_query = trim( strtolower( $this -> query_string ) );
    // check if the query starts with one of the $allowed_query_types
    foreach( $this -> allowed_query_types as $query_type ) {
      if( strpos($lc_query, $query_type ) === 0 ) {
        $type = $query_type;
      }
    }
    if ( $type ) {
      return $type;
    }
    else {
      return false;
    }
  }

  private function verifyParams( Array $params ) {
    // this function matches the number of parameters to the number of ? in the query
    $slot_count = substr_count( $this -> query_string, '?' );
    $param_count = count( $params );
    return ($slot_count == $param_count) ? true : false;
  }

  private function respond( bool $success ) {
    // this function returns an array in the format of
    // [ 'success': Boolean, 'errors':[Array], 'data':[Array] ]
    if ( $success == false ) {
      $this -> response['errors'] = $this -> errors;
      $this -> response['success'] = false;
    }
    elseif ( $success == true  ) {
      // return data if there is data eg from SELECT
      if ( isset($this -> data) ) {
        $this -> response['data'] = $this -> data;
      }
      // if inserting, return the id of inserted record
      if ( $this -> query_type == 'insert' ) {
        $this -> response['insert_id'] = $this -> connection -> insert_id;
      }
      $this -> response['success'] = true;
    }
    
    return $this -> response;
  }

  // this function builds the parameter string for each of the parameter
  private function buildParamString( Array $params ) {
    $param_string = array();
    $count = count( $params );
    if ( $count == 0 ) {
      return false;
    }
    else {
      foreach( $params as $param ) {
        if ( is_int($param) ) {
          array_push( $param_string, 'i' );
        }
        elseif ( is_string($param) ) {
          array_push( $param_string, 's' );
        }
        elseif ( is_double($param) ) {
          array_push( $param_string, 'd' );
        }
        else {
          array_push( $param_string, 'b' );
        }
      }
    }
    // return the parameter as a string to the caller
    return implode( '', $param_string );
  }
}
?>
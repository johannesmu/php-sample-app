<?php

namespace oldspice;

use oldspice\Database;
use oldspice\Session;
use \Exception;

class Account extends Database {

  public function __construct() {
    parent::__construct();
  }

  public function register( $email, $password ) {
    $response = array();
    $errors = array();
    // validate email
    try{
      if( filter_var( $email, FILTER_VALIDATE_EMAIL ) == false ) {
        throw new Exception('invalid email address');
      }
    }
    catch( Exception $exc ) {
      $errors['email'] = $exc -> getMessage();
    }
    // validate password
    try{
      if( strlen($password) < 8 ) {
        throw new Exception('password minimum is 8 characters');
      }
    }
    catch( Exception $exc ) {
      $errors['password'] = $exc -> getMessage();
    }
    if( count($errors) > 0 ) {
      $response['success'] = false;
      $response['errors'] = $errors;
      return $response;
    }
    // if there are no errors
    // hash the password
    $hash = password_hash( $password, PASSWORD_DEFAULT );
    $account_id = $this -> generateId();
    // query to insert account
    $query = "INSERT INTO account 
    (account_id, email, password, created, active, lastlogin)
    VALUES ( UNHEX(?), ?, ?, NOW(), 1, NOW() )";

    $statement = $this -> connection -> prepare( $query );
    $statement -> bind_param('sss', $account_id, $email, $hash );
    try{
      if(  $statement -> execute() == false ) {
        // check if account already exists
        if( $this -> connection -> errno == '1062' ) {
          throw new Exception('email address already used');
        }
        else{
          throw new Exception('something is terribly wrong');
        }
      }
    }
    catch( Exception $exc ) {
      $errors['system'] = $exc -> getMessage();
      $response['success'] = false;
      $response['errors'] = $errors;
      return $response;
    }
    // no errors, registration successful
    // // create user session
    // use Session class

    Session::set('auth', $account_id );
    $response['success'] = true;
    return $response;
  }

  private function generateId() {
    if( function_exists('random_bytes') ) {
      $bytes = random_bytes( 16 );
    }
    else{
      $bytes = openssl_random_pseudo_bytes( 16 );
    }
    return bin2hex( $bytes );
  }

  // login method
  public function login( $email, $password ) {
    $errors = array();
    $response = array();
   
    $query = "
    SELECT HEX( account_id ) as account_id, 
    email, 
    password
    FROM account
    WHERE active = 1 AND email = ?
    ";

    $statement = $this -> connection -> prepare( $query );
    $statement -> bind_param( 's' , $email );

    try {
      if ( $statement -> execute() == false ) {
        throw new Exception('error executing query');
      }
    }
    catch( Exception $exc ) {
      $errors['database'] = $exc -> getMessage();
      $response['success'] = false;
      $response['errors'] = $errors;
      return $response;
    }

    $result = $statement -> get_result();

    try {
      if( $result -> num_rows == 0 ) {
        throw new Exception('account does not exist');
      }
    }
    catch( Exception $exc ) {
      $errors['account'] = $exc -> getMessage();
      $response['success'] = false;
      $response['errors'] = $errors;
      return $response;
    }

    $account = $result -> fetch_assoc();
    
    try {
      if ( password_verify( $password, $account['password']) == false ) {
        throw new Exception('credentials supplied do not match our records');
      }
      else {
        $response['success'] = true;
        Session::set('auth', $account['account_id'] );
        return $response;
      }
    }
    catch( Exception $exc ) {
      $errors['account'] = $exc -> getMessage();
      $response['success'] = false;
      $response['errors'] = $errors;
      return $response;
    }
  }
}

?>
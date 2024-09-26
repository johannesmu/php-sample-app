<?php

namespace oldspice;

class Database {
  private $host;
  private $user;
  private $password;
  private $database;
  protected $connection;

  protected function __construct() {
    $this -> host = getenv('host');
    $this -> user = getenv('user');
    $this -> password = getenv('password');
    $this -> database = getenv('database');
    $this -> connection = mysqli_connect(
      $this -> host,
      $this -> user,
      $this -> password,
      $this -> database
    );
  }
}
?>
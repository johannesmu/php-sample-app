<?php

namespace oldspice;

use Dotenv;
use Dotenv\Dotenv as DotenvDotenv;

class Database {
  private $host;
  private $user;
  private $password;
  private $database;
  protected $connection;

  protected function __construct() {
    // turn off deprecation warnings!
    error_reporting(E_ALL ^ E_DEPRECATED);
    $path = $_SERVER['DOCUMENT_ROOT'];
    $dotenv = Dotenv\Dotenv::createImmutable($path);
    $dotenv -> load();
    $this -> host = $_ENV['DATABASE_URL'];
    $this -> user = $_ENV['DATABASE_USER'];
    $this -> password = $_ENV['DATABASE_PASSWORD'];
    $this -> database = $_ENV['DATABASE_NAME'];
    $this -> connection = mysqli_connect(
      $this -> host,
      $this -> user,
      $this -> password,
      $this -> database
    );
  }
}
?>
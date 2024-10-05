<?php
use oldspice\Config;

$config = new Config();
if( $_ENV['DEBUG'] == false ) {
    // error_reporting(E_ALL ^ E_DEPRECATED);
    error_reporting(E_ALL & ~E_DEPRECATED);
    //error_reporting(E_ALL & E_DEPRECATED & E_STRICT); 
}
else {
    // turn on reporting
    error_reporting(E_ALL);
}

// set variables
$app_name = $_ENV['APPNAME'];
?>
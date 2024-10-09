<?php
require('vendor/autoload.php');
require('config/site_config.php');

use oldspice\Session;

Session::unset('auth');
Session::emptyAll();


//redirect user to home page
header('location: index.php');
?>
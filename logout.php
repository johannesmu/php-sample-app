<?php
require('vendor/autoload.php');

use oldspice\Session;

Session::unset('auth');
Session::emptyAll();


//redirect user to home page
header('location: index.php');
?>
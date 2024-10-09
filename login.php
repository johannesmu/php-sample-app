<?php
require('vendor/autoload.php');
require('config/site_config.php');

use oldspice\Navigation;
use oldspice\Account;

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $acc = new Account();
  $login = $acc -> login($email,$password);

  // if login is successful
  if ( $login['success'] ) {
    // redirect to home
    header('location: /');
  }
}
else{
  $login = '';
  $email = '';
}

$navigation = Navigation::getNavigation();

//Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment( $loader );
//load the template
$template = $twig -> load( 'login.twig' );
//output the template to page
echo $template -> render([
  'navigation' => $navigation,
  'login' => $login,
  'email' => $email,
  'title' => 'Login to your account',
  'appname' => $app_name
]);

?>
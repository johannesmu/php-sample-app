<?php
require('vendor/autoload.php');
require('config/site_config.php');

use oldspice\Navigation;
use oldspice\WishList;

$navigation = Navigation::getNavigation();

$wish = new WishList();

if ( $_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) ) {
  $action = $_GET['action'];
  $product_id = $_GET['product_id'];
  if( $action == 'delete' ) {
    $delete = $wish -> deleteItem( $product_id );
    $delete_response = ( $delete ) ? true : false;
  }
}
else {
  $delete_response = null;
}

$wish_total = $wish -> getWishListTotal();
$wish_items = $wish -> getWishListItems();

//Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment( $loader );
//load the template
$template = $twig -> load( 'wishlist.twig' );
//output the template to page
echo $template -> render([
  'wish_total' => $wish_total,
  'wish_items' => $wish_items,
  'delete_response' => $delete_response,
  'navigation' => $navigation,
  'title' => 'Home Page',
  'appname' => $app_name
]);
?>
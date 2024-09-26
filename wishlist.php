<?php
require('vendor/autoload.php');

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
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment( $loader );
//load the template
$template = $twig -> load( 'wishlist.twig' );
//output the template to page
echo $template -> render([
  'wish_total' => $wish_total,
  'wish_items' => $wish_items,
  'delete_response' => $delete_response,
  'navigation' => $navigation,
  'title' => 'Home Page'
]);
?>
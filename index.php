<?php
require('vendor/autoload.php');

use oldspice\Navigation;
use oldspice\Product;
use oldspice\Category;
use oldspice\WishList;


$navigation = Navigation::getNavigation();

$p = new Product();
$products = $p -> getProducts();

$cat = new Category();
$categories = $cat -> getCategories();

$wish = new WishList();
$wish_total = $wish -> getWishListTotal();

//Twig
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment( $loader );
//load the template
$template = $twig -> load( 'home.twig' );
//output the template to page
echo $template -> render([
  'wish_total' => $wish_total,
  'categories' => $categories,
  'navigation' => $navigation,
  'products' => $products,
  'title' => 'Home Page'
]);
?>
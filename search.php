<?php
require('vendor/autoload.php');
require('config/site_config.php');

use oldspice\ProductSearch;
use oldspice\Navigation;

if( isset($_GET['query']) ) {
  $search = new ProductSearch();
  $search_result = $search -> getResult( $_GET['query'] );
}
else{
  $search_result = null;
}

$navigation = Navigation::getNavigation();

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
$template = $twig -> load('search.twig');

echo $template -> render(
  array(
    'result' => $search_result,
    'keyword' => $_GET['query'],
    'navigation' => $navigation,
    'title' => "Search result for " . $_GET['query'],
    'appname' => $app_name
  )
);

?>
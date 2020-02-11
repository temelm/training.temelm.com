<?php
  switch ($_SERVER['SCRIPT_NAME']) {
    case '/index.php':
      $current_page = 'Home';
      $page_title = 'Home';
      break;
    case '/catalogue.php':
      $current_page = 'Catalogue';
      $page_title = 'Catalogue';
      break;
    case '/product.php':
      $current_page = 'Product';
      $page_title = 'Product';
      break;
    default:
      $current_page = '404';
      $page_title = 'Page Not Found :(';
  }
?>
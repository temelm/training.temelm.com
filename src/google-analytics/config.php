<?php
  $server_script_name = $_SERVER['SCRIPT_NAME'];
  if (preg_match('/\/index.php/', $server_script_name)) {
    $current_page = 'Home';
    $page_title = 'Home';
  } elseif (preg_match('/\/catalogue.php/', $server_script_name)) {
    $current_page = 'Catalogue';
    $page_title = 'Catalogue';
  } elseif (preg_match('/\/product.php/', $server_script_name)) {
    $current_page = 'Product';
    $page_title = 'Product';
  } elseif (preg_match('/\/basket.php/', $server_script_name)) {
    $current_page = 'Basket';
    $page_title = 'Basket';
  } elseif (preg_match('/\/checkout.php/', $server_script_name)) {
    $current_page = 'Checkout';
    $page_title = 'Checkout';
  } elseif (preg_match('/\/confirmation.php/', $server_script_name)) {
    $current_page = 'Confirmation';
    $page_title = 'Confirmation';
  } else {
    $current_page = '404';
    $page_title = 'Page Not Found :(';
  }
?>
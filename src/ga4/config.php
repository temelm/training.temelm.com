<?php
  $server_script_name = $_SERVER['SCRIPT_NAME'];
  if (preg_match('/(\/ga4)?\/index.php/', $server_script_name)) {
    $page_title = 'Home';
  } elseif (preg_match('/(\/ga4)?\/catalogue.php/', $server_script_name)) {
    $page_title = 'Catalogue';
  } elseif (preg_match('/(\/ga4)?\/product.php/', $server_script_name)) {
    $page_title = 'Product';
  } elseif (preg_match('/(\/ga4)?\/basket.php/', $server_script_name)) {
    $page_title = 'Basket';
  } elseif (preg_match('/(\/ga4)?\/checkout.php/', $server_script_name)) {
    $page_title = 'Checkout';
  } elseif (preg_match('/(\/ga4)?\/confirmation.php/', $server_script_name)) {
    $page_title = 'Confirmation';
  } else {
    $page_title = '404';
  }
?>
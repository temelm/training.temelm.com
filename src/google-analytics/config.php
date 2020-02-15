<?php
  $server_script_name = $_SERVER['SCRIPT_NAME'];
  if (preg_match('/(\/google-analytics)?\/index.php/', $server_script_name)) {
    $page_title = 'Home';
  } elseif (preg_match('/(\/google-analytics)?\/catalogue.php/', $server_script_name)) {
    $page_title = 'Catalogue';
  } elseif (preg_match('/(\/google-analytics)?\/product.php/', $server_script_name)) {
    $page_title = 'Product';
  } elseif (preg_match('/(\/google-analytics)?\/basket.php/', $server_script_name)) {
    $page_title = 'Basket';
  } elseif (preg_match('/(\/google-analytics)?\/checkout.php/', $server_script_name)) {
    $page_title = 'Checkout';
  } elseif (preg_match('/(\/google-analytics)?\/confirmation.php/', $server_script_name)) {
    $page_title = 'Confirmation';
  } else {
    $page_title = '404';
  }
?>
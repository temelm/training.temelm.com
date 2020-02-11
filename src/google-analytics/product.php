<?php include "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <?php include "head.php"; ?>
  <body>
    <script src="./catalogue.js"></script>
    <?php include "nav.php"; ?>
    <script>
      const h1 = document.createElement('h1')
      const urlParams = new URLSearchParams(window.location.search)
      const productId = urlParams.get('pid')
      let product = window.catalogue.filter(item => item.id === productId)
      if (product && product.length) {
        product = product[0]
        document.title = h1.innerHTML = product.name
      } else {
        document.title = h1.innerHTML = 'Product Not Found :('
      }
      document.body.appendChild(h1);
    </script>
  </body>
</html>
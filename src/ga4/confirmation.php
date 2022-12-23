<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'head.php'; ?>
  <body>
    <script src='./basket.js'></script>
    <h1>Order Confirmation</h1>
    <script>
      if (window.basket.itemList.length === 0) {
        const empty = document.createElement('p')
        empty.innerHTML = 'Your basket is empty 😞 <a href="./catalogue.php">Browse Catalogue</a>'
        document.body.appendChild(empty)
      } else {
        // Display thank you message
        const thankYou = document.createElement('p')
        thankYou.innerHTML = 'Thank you for your order!'
        document.body.appendChild(thankYou)
        // Display 'Continue Shopping' link
        const continueShopping = document.createElement('p')
        continueShopping.innerHTML = `
          <a href="./catalogue.php">Continue Shopping</a>
        `
        document.body.appendChild(continueShopping)
        // Clear basket
        window.basket.clear()
      }
    </script>
  </body>
</html>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'head.php'; ?>
  <body>
    <script src='./basket.js'></script>
    <h1>Checkout</h1>
    <script>
      if (window.basket.itemList.length === 0) {
        const empty = document.createElement('p')
        empty.innerHTML = 'Your basket is empty 😞 <a href="./catalogue.php">Browse Catalogue</a>'
        document.body.appendChild(empty)
      } else {
        // Display basket total
        const total = document.createElement('p')
        const basketCount = window.basket.itemList.reduce((accumulator, item) => accumulator + item.quantity, 0)
        const basketTotal = window.basket.itemList
          .reduce((accumulator, item) => accumulator + (item.price * item.quantity), 0)
        total.innerHTML = `
          Total (${basketCount} ${(basketCount === 1) ? 'item' : 'items'}):
          <strong>${basketTotal.toFixed(2)}</strong>
        `
        document.body.appendChild(total)
        // Display 'Buy Now' button
        const buyNow = document.createElement('button')
        buyNow.setAttribute('class', 'button')
        buyNow.innerHTML = 'Buy now'
        document.body.appendChild(buyNow)
        // Continue to 'Confirmation' page
        buyNow.addEventListener('click', event => {
          event.preventDefault()
          setTimeout(() => {
            window.location.href = './confirmation.php'
          }, 400);
        })
      }
    </script>
  </body>
</html>
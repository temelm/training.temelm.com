<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang='en'>
  <?php include 'head.php'; ?>
  <body>
    <script src='./basket.js'></script>
    <h1>Basket</h1>
    <script>
      if (window.basket.itemList.length === 0) {
        const empty = document.createElement('p')
        empty.innerHTML = 'Your basket is empty 😞 <a href="./catalogue.php">Browse Catalogue</a>'
        document.body.appendChild(empty)
      } else {
        const table = document.createElement('table')
        table.innerHTML = `
          <thead>
            <tr>
              <th>Name</th>
              <th>Brand</th>
              <th>Category</th>
              <th>Variant</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Subtotal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            ${window.basket.itemList.reduce((accumulator, item) => {
              return accumulator + `
                <tr>
                  <td>${item.name || '-'}</td>
                  <td>${item.brand || '-'}</td>
                  <td>${item.category || '-'}</td>
                  <td>${item.variant || '-'}</td>
                  <td>${item.price || '-'}</td>
                  <td>${item.quantity || '-'}</td>
                  <td>${(item.price && item.quantity) ? (item.price * item.quantity).toFixed(2) : '0.00'}</td>
                  <td>
                    <a href="#" class="basket-remove" data-sku="${item.id}">Remove</a>
                  </td>
                </tr>
              `
            }, '')}
          </tbody>
        `
        document.body.appendChild(table)
        let basketRemoveLinks = document.querySelectorAll('.basket-remove')
        basketRemoveLinks = [...basketRemoveLinks]
        basketRemoveLinks.forEach(link => {
          link.addEventListener('click', event => {
            event.preventDefault()
            window.basket.remove(event.target.dataset.sku)
            setTimeout(() => {
              window.location.reload()
            }, 400);
          })
        })
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
        // Display 'Checkout' button
        const checkout = document.createElement('button')
        checkout.setAttribute('class', 'button')
        checkout.innerHTML = 'Checkout'
        document.body.appendChild(checkout)
        // Continue to 'Checkout' page
        checkout.addEventListener('click', event => {
          event.preventDefault()
          setTimeout(() => {
            window.location.href = './checkout.php'
          }, 400);
        })
        // Display 'Continue Shopping' link
        const continueShopping = document.createElement('p')
        continueShopping.innerHTML = `
          <a href="./catalogue.php">Continue Shopping</a>
        `
        document.body.appendChild(continueShopping)
      }
    </script>
  </body>
</html>
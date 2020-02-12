<?php include "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <?php include "head.php"; ?>
  <body>
    <style>
      img {
        max-width: 320px;
      }
      #quantity {
        max-width: 80px;
      }
    </style>
    <script src="./catalogue.js"></script>
    <?php include "nav.php"; ?>
    <script>
      function setTitleAndHeading (productName = 'Product Not Found :(') {
        const h1 = document.createElement('h1')
        document.title = h1.innerHTML = productName
        document.body.appendChild(h1)
      }

      const urlParams = new URLSearchParams(window.location.search)
      const productId = urlParams.get('pid')
      let product = window.catalogue.filter(item => item.id === productId)
      if (product && product.length) {
        product = product[0]
        // Set document.title and display page heading (product name)
        setTitleAndHeading(product.name)
        // Display product image
        const image = document.createElement('img')
        image.setAttribute('src', `./${product.id}.jpg`)
        image.setAttribute('alt', `./${product.name}.jpg`)
        document.body.appendChild(image)
        // Display product price
        const price = document.createElement('p')
        price.innerHTML = `
          Price:
          <strong>${product.price}</strong>
        `
        document.body.appendChild(price)
        // Display quantity field
        const quantity = document.createElement('p')
        quantity.innerHTML = `
          Quantity: 
          <select id="quantity">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        `
        document.body.appendChild(quantity)
        // Display Add to Basket button
        const addToBasket = document.createElement('button')
        addToBasket.setAttribute('class', 'button')
        addToBasket.innerHTML = 'Add to Basket'
        document.body.appendChild(addToBasket)
        // Handle Add to Basket button click
        addToBasket.addEventListener('click', event => {
          event.preventDefault()
          const item = {
            ...product,
            price: parseFloat(product.price),
            quantity: parseInt(document.querySelector('#quantity').value)
          }
          // @todo: Add tracking
          // Handle basket
          let basket = localStorage.getItem('basket')
          if (!basket) {
            localStorage.setItem('basket', JSON.stringify([item]))
          } else {
            basket = JSON.parse(basket)
            const index = basket.findIndex(i => i.id === product.id)
            if (index === -1) {
              basket.push(item)
            } else {
              basket[index].quantity += item.quantity
            }
            localStorage.setItem('basket', JSON.stringify(basket))
          }
          // Redirect to Basket 
          document.body.style.cursor = 'wait'
          setTimeout(() => {
            window.location.href = './basket.php'
          }, 1000);
        })
      } else {
        setTitleAndHeading()
      }
    </script>
  </body>
</html>
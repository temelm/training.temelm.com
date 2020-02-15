<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang='en'>
  <?php include 'head.php'; ?>
  <body>
    <style>
      img {
        max-width: 320px;
      }
      #quantity {
        max-width: 80px;
      }
    </style>
    <script src='./catalogue.js'></script>
    <script src='./basket.js'></script>
    <?php include 'nav.php'; ?>
    <script>
      function setTitleAndHeading (productName = 'Product Not Found') {
        document.title = productName
        const h1 = document.createElement('h1')
        h1.innerHTML = productName
        document.body.appendChild(h1)
        if (productName === 'Product Not Found') {
          const h2 = document.createElement('h2')
          h2.innerHTML = '🤨'
          document.body.appendChild(h2)
        }
      }
      const params = new URLSearchParams(window.location.search)
      const productId = params.get('sku')
      let product = window.catalogue.filter(item => item.id === productId)
      if (product && product.length) {
        product = product[0]
        // Set document.title and display heading (product name)
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
        // Display 'Quantity' field
        const quantity = document.createElement('p')
        quantity.innerHTML = `
          Quantity: 
          <select id='quantity'>
            <option value='1' selected>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
          </select>
        `
        document.body.appendChild(quantity)
        // Display 'Add to Basket' button
        const addToBasket = document.createElement('button')
        addToBasket.setAttribute('class', 'button')
        addToBasket.innerHTML = 'Add to Basket'
        document.body.appendChild(addToBasket)
        // Handle 'Add to Basket' button click
        addToBasket.addEventListener('click', event => {
          event.preventDefault()
          const item = {
            ...product,
            price: parseFloat(product.price),
            quantity: parseInt(document.querySelector('#quantity').value)
          }
          // Add item to basket
          window.basket.add(item)
          // Redirect to 'Basket' page
          document.body.style.cursor = 'wait'
          setTimeout(() => {
            window.location.href = './basket.php'
          }, 400);
        })
      } else {
        setTitleAndHeading()
      }
    </script>
  </body>
</html>
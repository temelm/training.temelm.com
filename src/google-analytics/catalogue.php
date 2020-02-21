<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang='en'>
  <?php include 'head.php'; ?>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3KKPGC"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script src='./catalogue.js'></script>
    <?php include 'nav.php'; ?>
    <h1>Catalogue</h1>
    <script>
      const ctlg = document.createElement('table')
      ctlg.innerHTML = `
        <thead>
          <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Variant</th>
            <th>Price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          ${window.catalogue.reduce((accumulator, item) => {
            return accumulator + `
              <tr>
                <td>${item.name || '-'}</td>
                <td>${item.brand || '-'}</td>
                <td>${item.category || '-'}</td>
                <td>${item.variant || '-'}</td>
                <td>${item.price || '-'}</td>
                <td>
                  <a href='./product.php?sku=${item.id}' data-sku='${item.id}'>Details</a>
                </td>
              </tr>
            `
          }, '')}
        </tbody>
      `
      document.body.appendChild(ctlg)
      const productLinks = [...document.querySelectorAll('a[data-sku]')]
      productLinks.forEach(link => {
        link.addEventListener('click', event => {
          event.preventDefault()
          const sku = event.target.dataset.sku
          let product = window.catalogue.filter(item => item.id === sku)[0]
          let index = window.catalogue.findIndex(item => item.id === sku)
          dataLayer.push({
            event: 'eec_productClick',
            ecommerce: {
              click: {
                actionField: {
                  list: 'Catalogue'
                },
                products: [{
                  id: product.id,
                  name: product.name,
                  brand: product.brand,
                  category: product.category,
                  variant: product.variant,
                  price: product.price,
                  position: index + 1
                }]
              }
            },
            eventCallback: function () {
              document.location = `./product.php?sku=${sku}`
            }
          });
        })
      })
    </script>
  </body>
</html>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang='en'>
  <?php include 'head.php'; ?>
  <body>
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
      // BEGIN: Track view_item_list
      gtag('event', 'view_item_list', {
        item_list_id: 'catalogue',
        item_list_name: 'Catalogue',
        items: window.catalogue.map((product, index) => {
          return {
            item_id: product.id,
            item_name: product.name,
            affiliation: 'n/a',
            coupon: 'n/a',
            currency: 'GBP',
            discount: 0,
            index,
            item_brand: product.brand,
            item_category: product.category,
            item_category2: 'n/a',
            item_category3: 'n/a',
            item_category4: 'n/a',
            item_category5: 'n/a',
            item_list_id: 'catalogue',
            item_list_name: 'Catalogue',
            item_variant: product.var,
            location_id: 'n/a',
            price: product.price,
            quantity: 1
          }
        })
      })
      // END: Track view_item_list
      const productLinks = [...document.querySelectorAll('a[data-sku]')]
      productLinks.forEach(link => {
        link.addEventListener('click', event => {
          // event.preventDefault()
          // const sku = event.target.dataset.sku
          // let product = window.catalogue.filter(item => item.id === sku)[0]
          // let index = window.catalogue.findIndex(item => item.id === sku)
          // dataLayer.push({
          //   event: 'eec_productClick',
          //   ecommerce: {
          //     click: {
          //       actionField: {
          //         list: 'Catalogue'
          //       },
          //       products: [{
          //         id: product.id,
          //         name: product.name,
          //         brand: product.brand,
          //         category: product.category,
          //         variant: product.variant,
          //         price: product.price,
          //         position: index + 1
          //       }]
          //     }
          //   },
          //   eventCallback: function () {
          //     document.location = `./product.php?sku=${sku}`
          //   }
          // });
        })
      })
    </script>
  </body>
</html>
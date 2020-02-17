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
                  <a href='./product.php?sku=${item.id}'>Details</a>
                </td>
              </tr>
            `
          }, '')}
        </tbody>
      `
      document.body.appendChild(ctlg)
    </script>
  </body>
</html>
<?php include "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <?php include "head.php"; ?>
  <body>
    <script src="./catalogue.js"></script>
    <?php include "nav.php"; ?>
    <h1>Catalogue</h1>
    <script>
      const cat = document.createElement('table')
      cat.innerHTML = `
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
                  <a href="./product.php?pid=${item.id}">Details</a>
                </td>
              </tr>
            `
          }, '')}
        </tbody>
      `
      document.body.appendChild(cat)
    </script>
  </body>
</html>
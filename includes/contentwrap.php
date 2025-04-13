<div id="page-content-wrapper">
          <?php 

          if (isset($page)) {
            if ($page == 'dashboard') {
              include 'dashboard.php';
            } elseif ($page == 'products') {
              include 'dashboard-products.php';
            } elseif ($page == 'products-create') {
              include 'dashboard-product-create.php';
            } elseif ($page == 'products-details') {
              include 'dashboard-products-details.php';
            } elseif ($page == 'products-delete') {
              include 'dashboard-product-delete.php';
            } elseif ($page == 'galleries') {
              include 'dashboard-galleries.php';
            } elseif ($page == 'galleries-create') {
              include 'dashboard-galleries-create.php';
            } elseif ($page == 'galleries-details') {
              include 'dashboard-galleries-details.php';
            } elseif ($page == 'galleries-delete') {
              include 'dashboard-galleries-delete.php';
            } elseif ($page == 'categories') {
              include 'dashboard-categories.php';
            } elseif ($page == 'categories-create') {
              include 'dashboard-categories-create.php';
            } elseif ($page == 'categories-details') {
              include 'dashboard-categories-details.php';
            } elseif ($page == 'categories-delete') {
              include 'dashboard-categories-delete.php';
            } elseif ($page == 'transactions') {
              include 'transaction/dashboard-transactions.php';
            } elseif ($page == 'transactions-receiver') {
              include 'transaction/dashboard-transactions-receiver.php';
            } elseif ($page == 'transactions-no-confirm') {
              include 'transaction/dashboard-transactions-no-confirm.php';
            } elseif ($page == 'transactions-confirm') {
              include 'transaction/dashboard-transactions-confirm.php';
            } elseif ($page == 'transactions-pickup') {
              include 'transaction/dashboard-transactions-pickup.php';
            } elseif ($page == 'transactions-sent') {
              include 'transaction/dashboard-transactions-sent.php';
            } elseif ($page == 'transactions-details') {
              include 'transaction/dashboard-transactions-details.php';
            } elseif ($page == 'transactions-delete') {
              include 'transaction/dashboard-transactions-delete.php';
            } elseif ($page == 'transactions-transfer') {
              include 'transaction/dashboard-transfer.php';
            } elseif ($page == 'rekening') {
              include 'rekening/dashboard-rekening.php';
            } elseif ($page == 'rekening-create') {
              include 'rekening/dashboard-rekening-create.php';
            } elseif ($page == 'rekening-details') {
              include 'rekening/dashboard-rekening-details.php';
            } elseif ($page == 'rekening-delete') {
              include 'rekening/dashboard-rekening-delete.php';
            } elseif ($page == 'drivers') {
              include 'drivers/dashboard-drivers.php';
            } elseif ($page == 'drivers-create') {
              include 'drivers/dashboard-drivers-create.php';
            } elseif ($page == 'drivers-details') {
              include 'drivers/dashboard-drivers-details.php';
            } elseif ($page == 'drivers-delete') {
              include 'drivers/dashboard-drivers-delete.php';
            } elseif ($page == 'users') {
              include 'users/dashboard-users.php';
            } elseif ($page == 'users-create') {
              include 'users/dashboard-users-create.php';
            } elseif ($page == 'users-details') {
              include 'users/dashboard-users-details.php';
            } elseif ($page == 'users-delete') {
              include 'users/dashboard-users-delete.php';
            } elseif ($page == 'logout') {
              include '../logout.php';
            } else {
              echo "Halaman Tidak Ditemukan";
            }
          } else {
            include 'dashboard.php';
          }

          ?>
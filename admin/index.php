<?php 
require_once '../config/config.php';

if (isset($_SESSION["login"]) && isset($_SESSION["driver"])) {
  header("Location: ../driver/index.php");
  exit;
}

if (!isset($_SESSION["login"]) && !isset($_SESSION["user"])) {
  header("Location: ../index.php");
  exit;
}

$id = $_SESSION["user"];
$result = query("SELECT * FROM users WHERE id_user = $id")[0];
if ($result['roles'] !== 'ADMIN') {
  header("Location: ../index.php");
  exit;
}

if (isset($_POST["terkirim"])) {
  if (terkirim($_POST) > 0) {
    header("Location: ?page=transactions");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Dashboard | Toko</title>

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="../assets/style/main.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/vendor/DataTables/datatables.min.css"/>
  
</head>

<body>
  <?php 
  $page = isset($_GET["page"]) ? $_GET["page"] : '';
  ?>
  
  <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
      <!-- sidebar -->
      <div>
        <button id="sidebar-toggle">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </button>
      </div>

      <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
          <img src="../assets/images/icon1.png" alt="" style="width: 150px;" />
        </div>
        
        <div class="list-group list-group-flush">
          <a href="?page=dashboard" class="list-group-item list-group-item-action<?= ($page == 'dashboard' || $page == '') ? ' active' : ''; ?>">Dashboard</a>
          <a href="?page=products" class="list-group-item list-group-item-action<?= ($page == 'products' || $page == 'products-create' || $page == 'products-details') ? ' active' : ''; ?>">Products</a>
          <a href="?page=galleries" class="list-group-item list-group-item-action<?= ($page == 'galleries' || $page == 'galleries-create' || $page == 'galleries-details') ? ' active' : ''; ?>">Galleries</a>
          <a href="?page=categories" class="list-group-item list-group-item-action<?= ($page == 'categories' || $page == 'categories-create' || $page == 'categories-details' || $page == 'categories-delete') ? ' active' : ''; ?>">Categories</a>
          
          <div class="dropdown">
            <button class="list-group-item list-group-item-action dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Transactions
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="?page=transactions">All Transactions</a>
              <a class="dropdown-item" href="?page=transactions-no-confirm">Belum Konfirmasi</a>
              <a class="dropdown-item" href="?page=transactions-confirm">Konfirmasi</a>
              <a class="dropdown-item" href="?page=transactions-pickup">Pick Up</a>
              <a class="dropdown-item" href="?page=transactions-sent">Terkirim</a>
            </div>
          </div>
          
          <a href="?page=rekening" class="list-group-item list-group-item-action<?= ($page == 'rekening' || $page == 'rekening-create' || $page == 'rekening-details') ? ' active' : ''; ?>">Rekening</a>
          <a href="?page=drivers" class="list-group-item list-group-item-action<?= ($page == 'drivers' || $page == 'drivers-create' || $page == 'drivers-details' || $page == 'drivers-delete') ? ' active' : ''; ?>">Drivers</a>
          <a href="?page=users" class="list-group-item list-group-item-action<?= ($page == 'users' || $page == 'users-create' || $page == 'users-details') ? ' active' : ''; ?>">Users</a>
          <a href="?page=logout" class="list-group-item list-group-item-action<?= ($page == 'logout') ? ' active' : ''; ?>">Sign Out</a>
        </div>
      </div>

      <!-- page content -->
      <?php include '../includes/contentwrap.php'; ?>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- <script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script> -->
  <script type="text/javascript" src="../assets/vendor/DataTables/datatables.min.js"></script>

  <script>
      AOS.init();
    $(document).ready(function() {
      $('#table').DataTable();
    });

    document.getElementById("sidebar-toggle").addEventListener("click", function() {
      document.getElementById("wrapper").classList.toggle("toggled");
      document.getElementById("sidebar-wrapper").classList.toggle("collapse");
    });
  </script>
</body>
</html>

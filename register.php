<?php 
require_once 'config/config.php';
if (isset($_SESSION["login"]) && isset($_SESSION["user"])) {
  header("Location: index.php");
} elseif (isset($_SESSION["driver"])) {
  header("Location: driver/index.php");
}

if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
      $_SESSION['login_success'] = 'Registrasi Berhasil Silahkan Login';
      header("Location: login.php");
  } else {
    if (isset($_SESSION["error"])) {
      $error = $_SESSION["error"];
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Registrasi | Toko Supplier Daging Ayam Segar</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="assets/style/main.css" rel="stylesheet" />
  </head>

  <body>
    <!-- navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="index.php" class="navbar-brand" title="home">
        <img src="assets/images/icon1.png" style="width: 90px;" alt="logo" />
        </a>
        <button
          class="navbar-toggler d-lg-none"
          type="button"
          data-toggle="collapse"
          data-target="#collapsibleNavId"
          aria-controls="collapsibleNavId"
          aria-expanded="false"
          aria-label="Toggle navigation"
        ></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">All Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- page content -->
    <div class="page-content page-auth" id="register">
      <section class="store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-5">
              <h2 class="mb-4" style="text-align: center;">
                Untuk belanja kebutuhanmu <br>
                di platform kami<br>
                silahkan daftar dirimu!
              </h2>

              <form action="" class="mt-3" method="POST">
                  <?php if (isset($error)) : ?>
                  <div class="alert alert-danger">
                      <p class="font-weight-bold m-0"><?= $error; ?></p>
                  </div>
                  <?php endif;?>
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="form-control"
                    autofocus
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="email">Alamat Email</label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="password2">Konfirmasi Password</label>
                  <input
                    type="password"
                    name="password2"
                    id="password2"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="telpon">Phone Number</label>
                  <input
                    type="number"
                    name="telpon"
                    id="telpon"
                    class="form-control"
                    required
                  />
                </div>
                <button
                  type="submit"
                  name="register"
                  class="btn btn-success btn-block mt-4"
                >
                  Sign Up Now
                </button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- footer -->
    </section>
      <section class="counter text-white" style="background-color: #001524; padding: 40px; margin-top: 100px;" id="counter">

  
  <footer >
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-center">
          <h3 style="background-color: #001524; border-bottom: 2px solid white; " class="pb-3">Pajakku - Platform Pasar Virtual untuk Mendukung Mobilitas UMKM Lokal</h3>
          <p class="pt-4 pb-2 text-white"> &copy; 2023 Hak Cipta. Seluruh Hak Cipta Dilindungi.</p>
        </div>
      </div>
    </div>
  </footer>
</section>
    <!-- akhir footer -->
    <style>
  /* Menghilangkan opsi increment dan decrement pada input angka */
  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  input[type="number"] {
    -moz-appearance: textfield;
  }
</style>
    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.slim.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="assets/js/navbar-scroll.js"></script>
  </body>
</html>

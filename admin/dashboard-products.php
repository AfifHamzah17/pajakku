<?php include '../includes/navheader.php'; ?>
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">My Products</h2>
      <p class="dashboard-subtitle">Manage it well and get money</p>
    </div>
    <div class="dashboard-content">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row mb-4">
                <div class="col-12">
                <a href="?page=products-create" class="btn btn-success">
                  + Add New Product
                </a>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Harga</th>
                          <th scope="col">Kategori</th>
                          <th scope="col">Stok</th>
                          <th scope="col" class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          $query = "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.id";
                          $products = query($query);
                        ?>
                        <?php foreach ($products as $product) : ?>
                          <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $product["product_name"]; ?></td>
                            <td><?= number_format($product["price"]); ?></td>
                            <td><?= $product["category_name"]; ?></td>
                            <td>
                              <?php if ($product["stock"] <= 0) : ?>
                                <span class="badge badge-pill badge-danger">SOLD OUT</span>
                              <?php else: ?>
                                <span class="badge badge-pill badge-success">STOCK</span>
                              <?php endif; ?>
                            </td>
                            <td style="width: 17%; text-align: center;">
                              <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="?page=products-details&id=<?= $product["id_product"]; ?>">Edit</a>
                                  <a class="dropdown-item" onclick="return confirm('Apakah Ingin Menghapus <?= $product['product_name'] ?> ?')" href="?page=products-delete&id=<?= $product["id_product"]; ?>">Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php $no++ ?>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

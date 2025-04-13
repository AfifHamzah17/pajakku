<?php include '../includes/navheader.php'; ?>
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Products Galleries</h2>
      <p class="dashboard-subtitle">Manage Your Product Galleries</p>
    </div>
    <div class="dashboard-content">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row mb-4">
                <div class="col-12">
                <a href="?page=galleries-create" class="btn btn-success">
                  + Add New Galleries
                </a>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover w-100" id="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Produk</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          $galleries = query("SELECT * FROM products_galleries INNER JOIN products ON products_galleries.product_id = products.id_product");
                        ?>
                        <?php foreach ($galleries as $gallery) : ?>
                          <tr>
                            <th scope="row" style="width: 10%;"><?= $no; ?></th>
                            <td><?= $gallery["product_name"]; ?></td>
                            <td><img src="../assets/images/<?= $gallery["photos"]; ?>" style="max-height: 60px;" alt=""></td>
                            <td style="width: 20%;">
                              <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="?page=galleries-details&id=<?= $gallery["id_gallery"]; ?>">Edit</a>
                                  <a class="dropdown-item" onclick="return confirm('Apakah Ingin Menghapus Gallery Ini ?')" href="?page=galleries-delete&id=<?= $gallery["id_gallery"]; ?>">Delete</button>
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

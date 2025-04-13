<?php include '../includes/navheader.php'; ?>
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Categories</h2>
      <p class="dashboard-subtitle">Manage Your Product Categories</p>
    </div>
    <div class="dashboard-content">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row mb-4">
                <div class="col-12">
                <a href="?page=categories-create" class="btn btn-success">
                  + Add New Categories
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
                          <th scope="col">Nama Category</th>
                          <th scope="col">Slug</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          $categories = query("SELECT * FROM categories");
                        ?>
                        <?php foreach ($categories as $category) : ?>
                          <tr>
                            <th scope="row" style="width: 10%;"><?= $no; ?></th>
                            <td><?= $category["category_name"]; ?></td>
                            <td><?= $category["slug"]; ?></td>
                            <td style="width: 20%;">
                              <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="?page=categories-details&id=<?= $category["id"]; ?>">Edit</a>
                                  <a class="dropdown-item" onclick="return confirm('Apakah Ingin Menghapus category Ini ?')" href="?page=categories-delete&id=<?= $category["id"]; ?>">Delete</button>
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

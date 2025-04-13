<?php include '../includes/navheader.php'; ?>
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">My Transaction</h2>
      <p class="dashboard-subtitle">This is menu for your transactions</p>
      <div class="row mb-3">
        <div class="col-12">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cetakPDF">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill mr-1" viewBox="0 0 16 16">
              <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
              <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            </svg> Cetak PDF
          </button>
        </div>
      </div>
    </div>
    <div class="dashboard-content">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <?php if (isset($_SESSION["success"])) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= $_SESSION["success"]; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif;?>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Code</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Total</th>
                          <th scope="col">Pembayaran</th>
                          <th scope="col">Status</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col" class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          $user_id = $_SESSION["user"];
                          $query = "SELECT * FROM transactions INNER JOIN users ON transactions.user_id = users.id_user INNER JOIN rekening_numbers ON transactions.rekening_id = rekening_numbers.id_rekening";
                          $transactions = query($query);
                        ?>
                        <?php foreach ($transactions as $transaction) : ?>
                          <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td>#<?= $transaction["code"]; ?></td>
                            <td><?= $transaction["name"]; ?></td>
                            <td><?= number_format($transaction["total_price"]); ?></td>
                            <td><?= $transaction["bank_name"]; ?></td>
                            <td>
                              <?php if ($transaction["transaction_status"] == "BELUM KONFIRMASI") : ?>
                                <span class="badge badge-pill badge-danger"><?= $transaction["transaction_status"]; ?></span>
                              <?php elseif($transaction["transaction_status"] == "TERKONFIRMASI"): ?>
                              <span class="badge badge-pill badge-warning"><?= $transaction["transaction_status"]; ?></span>
                              <?php elseif($transaction["transaction_status"] == "PICKUP") : ?>
                                <span class="badge badge-pill badge-primary"><?= $transaction["transaction_status"]; ?></span>
                              <?php else: ?>
                                <span class="badge badge-pill badge-success"><?= $transaction["transaction_status"]; ?></span>
                              <?php endif; ?>
                            </td>
                            <?php 
                              $tanggal = $transaction["created_at"];
                            ?>
                            <td><?= date('d, F Y', strtotime($tanggal)); ?></td>
                            <td style="width: 17%; text-align: center;">
                              <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="?page=transactions-details&id=<?= $transaction["id_transaction"]; ?>">Lihat</a>
                                  <a class="dropdown-item" onclick="return confirm('Apakah Ingin Menghapus transaction ini ?')" href="?page=transactions-delete&id=<?= $transaction["id_transaction"]; ?>">Delete</a>
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



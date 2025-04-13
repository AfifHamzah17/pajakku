<?php include '../includes/navheader.php'; ?>
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Dashboard</h2>
      <p class="dashboard-subtitle">Look what you have made today!</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-2">
            <div class="card-body">
            <?php 
              $customers = rows("SELECT * FROM users");
            ?>
              <div class="dashboard-card-title">Customer</div>
              <div class="dashboard-card-subtitle"><?= $customers; ?></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-2">
            <div class="card-body">
            <?php 
              $transactions = query("SELECT * FROM transactions");
              $total_price = 0;
              foreach ($transactions as $t ) {
                $total_price += $t["total_price"];
              }
              
              $total_price_product = 0;
              $products = query("SELECT * FROM products");
              foreach ($products as $p ) {
                $total_price_product += $p["price"];
              }

              $revenue = $total_price - $total_price_product;
              if ($revenue < 0) {
                $revenue = 0;
              }
            ?>
              <div class="dashboard-card-title">Revenue</div>
              <div class="dashboard-card-subtitle">Rp. <?= number_format($revenue); ?></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-2">
            <div class="card-body">
            <?php 
              $transactionCount = rows("SELECT * FROM transactions");
            ?>
              <div class="dashboard-card-title">Transaction</div>
              <div class="dashboard-card-subtitle"><?= $transactionCount; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
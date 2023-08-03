<?= $this->extend('layout/invoicetemplate'); ?>

<?= $this->section('invoicetemplate'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark navbar-custom top-nav-collapse">
  <a class="navbar-nav" id="navbarNav" style="color: white;">Pavilion Hotel</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/'); ?>">Home</a>
      </li>
    </ul>
  </div>
</nav>
<!-- End Navbar -->

<!--History-->
<div id="projects" class="filter">
  <div class="container">
    <div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h1 class="mb-2 text-center">History Booking</h1><br>
      </div>
      <?php foreach ($result as $row) : ?>
        <div class="modal-box" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?= $row['namaLengkapTamu']; ?></h5>
              <h5 class="modal-title" id="exampleModalLabel" style="float:right;"># <?= $row['idBooking']; ?></h5>
            </div>
            <div class="modal-body">
              <p>Nama Tamu: <?= $row['namaLengkapTamu']; ?></p>
              <p>Nomor telephone: <?= $row['nomorTeleponTamu']; ?></p>
              <p>Check-In: <?= $row['checkIn']; ?></p><br>
              <a href="<?= base_url('index/invoice/' . $row['idBooking']); ?>" class="btn btn-solid-lg btn-block" style="background-color: coral; color: cornsilk; border-color: transparent;">Detail</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <br>
    </div>
  </div>
</div>
</div>

<?= $this->endSection(); ?>
<?= $this->extend('layout/invoicetemplate'); ?>

<?= $this->section('invoicetemplate'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark navbar-custom top-nav-collapse">
  <a class="navbar-nav" id="navbarNav" style="color: white;">Pavilion Hotel</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">

    </ul>
  </div>
</nav>
<!-- End Navbar -->

<!--History-->
<div style="padding-top:1cm;">
  <div class="container">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <h1 class="mb-2 text-center">Invoice</h1>
      <h3 align="center">Bukti Pembelian (RECEIPT)</h3>
    </div><br>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

      <img src="<?= base_url($hotel['fotoHotel']);  ?>" style="float:left;width:135px;height:135px; margin-right:10px;"></img>
      <h5>Kode Booking : </h5>
      <p> <?= $booking['idBooking']; ?></p>
      <h5>Nama Hotel: <?= $booking['namaHotel']; ?></h5>
      <p>Nama Tamu: <?= $booking['namaLengkapTamu']; ?></p>
      <p>Nomor telephone: <?= $booking['nomorTeleponTamu']; ?></p>
      <p>Check-In: <?= $booking['checkIn']; ?></p>
      <p>Check-Out: <?= $booking['checkOut']; ?></p>
      <p>Harga: <?= $booking['harga']; ?></p>
      <p>Jam Booking: <?= $booking['jamTanggalBooking']; ?></p>
      <a href="<?= base_url('index/bookingHistory'); ?>" class="btn btn-solid-lg btn-block" style="background-color: coral; color: cornsilk; border-color: transparent;">Back</a>

    </div>
  </div>
  <br>
</div>
</div>
</div>
<?= $this->endSection(); ?>
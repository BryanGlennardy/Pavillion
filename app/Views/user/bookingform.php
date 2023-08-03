<?= $this->extend('layout/bookingtemplate'); ?>

<?= $this->section('bookingtemplate'); ?>

<div id="projects" class="filter">
  <div class="container">

    <div class="row gutters">
      <form action="<?= base_url('admin/doBookingAdmin/' . $idHotel); ?>" method="POST" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h1 class="mb-2 text-primary" align="center" style="color: black !important;">Booking Form</h1>
          <h5 align="center">Please Fill The Form Carefully !</h5><br>

        </div>
        <input type="hidden" name="emailUser" id="emailUser" value="<?= $emailUser; ?>">
        <input type="hidden" name="idHotel" value="<?= $idHotel; ?>">
        <div class="form-group">
          <h3 for="namaLengkapTamu">Nama Hotel</h3>
          <input type="text" class="form-control" placeholder="Enter Your Full Name" value="<?= $namaHotel; ?>" style="block-size: 50px;" disabled>
          <span class="help-block" style="color:red"></span>
        </div>
        <div class="form-group">
          <h3 for="emailUser">Email User</h3>
          <input type="email" class="form-control" placeholder="Enter Your Full Name" value="<?= $emailUser; ?>" style="block-size: 50px;" disabled>
          <span class="help-block" style="color:red"></span>
        </div>
        <div class="form-group">
          <h3 for="namaLengkapTamu">Full Name</h3>
          <input type="text" class="form-control <?= ($validation->hasError('namaLengkapTamu')) ? 'is-invalid' : ''; ?>" id="namaLengkapTamu" name="namaLengkapTamu" placeholder="Enter Your Full Name" value="<?= old('namaLengkapTamu'); ?>" style="block-size: 50px;">
          <span class="help-block" style="color:red"></span>
          <div class="invalid-feedback">
            <?= $validation->getError('namaLengkapTamu'); ?>
          </div>
        </div>
        <div class="form-group">
          <h3 for="nomorTeleponTamu">Phone Number</h3>
          <input type="text" class="form-control <?= ($validation->hasError('nomorTeleponTamu')) ? 'is-invalid' : ''; ?>" id="nomorTeleponTamu" name="nomorTeleponTamu" placeholder="Enter Your Phone Number" value="<?= old('nomorTeleponTamu'); ?>" style="block-size: 50px;">
          <span class="help-block" style="color:red"></span>
          <div class="invalid-feedback">
            <?= $validation->getError('nomorTeleponTamu'); ?>
          </div>
        </div>
        <div class="form-group">
          <h3 for="emailTamu">Email</h3>
          <input type="email" class="form-control <?= ($validation->hasError('emailTamu')) ? 'is-invalid' : ''; ?>" id="emailTamu" name="emailTamu" placeholder="Enter Your Email" value="<?= old('emailTamu'); ?>" style="block-size: 50px;">
          <span class="help-block" style="color:red"></span>
          <div class="invalid-feedback">
            <?= $validation->getError('emailTamu'); ?>
          </div>
        </div>
        <div class="form-group">
          <h3 for="checkIn">Check In Date</h3>
          <input type="date" class="form-control <?= ($validation->hasError('checkIn')) ? 'is-invalid' : ''; ?>" id="checkIn" name="checkIn" placeholder="" min="<?= date('Y-m-d'); ?>" value="<?= old('checkIn'); ?>" onchange="limitCheckoutAndCalcPrice()" style="block-size: 50px;">
          <div class="invalid-feedback">
            <?= $validation->getError('checkIn'); ?>
          </div>
        </div>
        <div class="form-group">
          <h3 for="checkOut">Check Out Date</h3>
          <input type="date" class="form-control <?= ($validation->hasError('checkOut')) ? 'is-invalid' : ''; ?>" id="checkOut" name="checkOut" placeholder="" min="<?= date('Y-m-d'); ?>" value="<?= old('checkOut'); ?>" onchange="limitCheckoutAndCalcPrice()" style="block-size: 50px;">
          <div class="invalid-feedback">
            <?= $validation->getError('checkOut'); ?>
          </div>
        </div>
        <div class="form-group">
          <h3 for="jumlahKamar">Room Total</h3>
          <input type="number" class="form-control <?= ($validation->hasError('jumlahKamar')) ? 'is-invalid' : ''; ?>" id="jumlahKamar" name="jumlahKamar" min="1" max="<?= $jumlahKamar; ?>" placeholder="Choose a Room Total" value="<?= (old('jumlahKamar') ? old('jumlahKamar') : 1); ?>" onchange="calcPrice()" style="block-size: 50px;">
          <span class="help-block" style="color:red"></span>
          <div class="invalid-feedback">
            <?= $validation->getError('jumlahKamar'); ?>
          </div>
        </div>
        <div class="form-group">
          <h3 for="total">Total Price
            <span id="total">0</span>
          </h3>
        </div>

        <div class="container">
          <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Book Now</button>
          <a href="<?= base_url(); ?>" style="text-decoration: none;" type="button" class="btn btn-danger btn-block">Cancel</a>
        </div>
        <input type="hidden" id="harga" value="<?= $harga; ?>">
        <input type="hidden" id="hargaTotal" name="hargaTotal" value="0">
      </form>

      <script>
        function limitCheckoutAndCalcPrice() {
          var checkIn = document.querySelector('#checkIn').value;
          var checkOut = document.querySelector('#checkOut').value;
          if (checkIn >= checkOut) {
            document.getElementById("checkOut").min = checkIn;
            document.getElementById("checkOut").value = checkIn;
          }
          calcPrice();
        }

        function calcPrice() {
          var oneDay = 24 * 60 * 60 * 1000;
          var price = document.querySelector('#harga').value;
          var rooms = document.querySelector('#jumlahKamar').value;
          var checkIn = document.querySelector('#checkOut').value;
          var checkOut = document.querySelector('#checkOut').value;
          checkIn = checkIn.replace(/\//g, ",");
          checkOut = checkOut.replace(/\//g, ",");

          checkIn = new Date(checkIn);
          checkOut = new Date(checkOut);
          var dayDiff = Math.round(Math.abs(((checkIn.getTime() - checkOut.getTime())) / (oneDay))) + 1;

          var total = price * rooms * dayDiff;
          if (isNaN(total)) total = 0;
          total = total.toLocaleString().replaceAll(",", ".");
          document.getElementById("total").innerHTML = total;
          total = total.replaceAll(".", "");
          document.getElementById("hargaTotal").value = total;
        }
      </script>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
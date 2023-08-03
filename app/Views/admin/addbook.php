<?= $this->extend('layout/loginregistemplate'); ?>

<?= $this->section('content'); ?>
<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Tambah Booking</h2>
                    <form action="<?= base_url("Admin/doBookingAdmin"); ?>" method="POST" enctype="multipart/form-data" class="register-form" id="register-form">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="idBooking"><i class="zmdi zmdi-label-alt material-icons-name "></i></label>
                            <input type="text" class="<?= ($validation->hasError('idBooking')) ? 'is-invalid' : ''; ?>" name="idBooking" id="idBooking" placeholder="Booking ID" value="<?= old('idBooking'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('idBooking'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="idHotel"><i class="zmdi zmdi-label-alt material-icons-name "></i></label>
                            <input type="text" class="<?= ($validation->hasError('idHotel')) ? 'is-invalid' : ''; ?>" name="idHotel" id="idHotel" placeholder="Hotel ID" value="<?= old('idHotel'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('idHotel'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="emailUser"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="<?= ($validation->hasError('emailUser')) ? 'is-invalid' : ''; ?>" name="emailUser" id="emailUser" placeholder="Email User" value="<?= old('emailUser'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('emailUser'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="namaLengkapTamu"><i class="zmdi zmdi-account"></i></label>
                            <input type="text" class="<?= ($validation->hasError('namaLengkapTamu')) ? 'is-invalid' : ''; ?>" name="namaLengkapTamu" id="namaLengkapTamu" placeholder="Nama Lengkap Tamu" value="<?= old('namaLengkapTamu'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('namaLengkapTamu'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nomorTeleponTamu"><i class="zmdi zmdi-phone"></i></label>
                            <input type="text" class="<?= ($validation->hasError('nomorTeleponTamu')) ? 'is-invalid' : ''; ?>" name="nomorTeleponTamu" id="nomorTeleponTamu" placeholder="Nomor Telepon Tamu" value="<?= old('nomorTeleponTamu'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('nomorTeleponTamu'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="emailTamu"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="<?= ($validation->hasError('emailTamu')) ? 'is-invalid' : ''; ?>" name="emailTamu" id="emailTamu" placeholder="Email Tamu" value="<?= old('emailTamu'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('emailTamu'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jumlahKamar"><i class="zmdi zmdi-plus"></i></label>
                            <input type="text" class="<?= ($validation->hasError('jumlahKamar')) ? 'is-invalid' : ''; ?>" name="jumlahKamar" id="jumlahKamar" placeholder="Number of Rooms" value="<?= old('jumlahKamar'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlahKamar'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="checkIn"><i class="zmdi zmdi-calendar-check"></i></label>
                            <input type="date" class="<?= ($validation->hasError('checkIn')) ? 'is-invalid' : ''; ?>" name="checkIn" id="checkIn" placeholder="Check In" value="<?= old('checkIn'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('checkIn'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="checkOut"><i class="zmdi zmdi-calendar-check"></i></label>
                            <input type="date" class="<?= ($validation->hasError('checkOut')) ? 'is-invalid' : ''; ?>" name="checkOut" id="checkOut" placeholder="Check Out" value="<?= old('checkOut'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('checkOut'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="harga"><i class="zmdi zmdi-label"></i></label>
                            <input type="text" class="<?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" name="harga" id="harga" placeholder="Price" value="<?= old('harga'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga'); ?>
                            </div>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Tambah Booking" /><br><br>
                        </div>

                    </form>
                    <a href="<?= base_url('/index/adminPage'); ?>">
                        <button class="btn btn-danger btn-lg ">
                            Cancel
                        </button>
                    </a>
                </div>
                <div class="signup-image">
                    <figure><img src="<?= base_url('assets/images/gk_ada_bg.png'); ?>" alt="image"></figure>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
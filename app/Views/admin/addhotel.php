<?= $this->extend('layout/loginregistemplate'); ?>

<?= $this->section('content'); ?>
<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Tambah Hotel</h2>
                    <form action="<?= base_url("Admin/doAddHotel"); ?>" method="POST" enctype="multipart/form-data" class="register-form" id="register-form">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="idHotel"><i class="zmdi zmdi-label-alt material-icons-name "></i></label>
                            <input type="text" class="<?= ($validation->hasError('idHotel')) ? 'is-invalid' : ''; ?>" name="idHotel" id="idHotel" placeholder="Hotel ID" value="<?= old('idHotel'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('idHotel'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="namaHotel"><i class="zmdi zmdi-city"></i></label>
                            <input type="text" class="<?= ($validation->hasError('namaHotel')) ? 'is-invalid' : ''; ?>" name="namaHotel" id="namaHotel" placeholder="Hotel Name" value="<?= old('namaHotel'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('namaHotel'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fasilitas"><i class="zmdi zmdi-city-alt"></i></label>
                            <input type="text" class="<?= ($validation->hasError('fasilitas')) ? 'is-invalid' : ''; ?>" name="fasilitas" id="fasilitas" placeholder="Facilities" value="<?= old('fasilitas'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('fasilitas'); ?>
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
                            <label for="rating"><i class="zmdi zmdi-star"></i></label>
                            <input type="text" class="<?= ($validation->hasError('rating')) ? 'is-invalid' : ''; ?>" name="rating" id="rating" placeholder="Rating" value="<?= old('rating'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('rating'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="harga"><i class="zmdi zmdi-label"></i></label>
                            <input type="text" class="<?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" name="harga" id="harga" placeholder="Price" value="<?= old('harga'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lokasi"><i class="zmdi zmdi-pin"></i></label>
                            <input type="text" class="<?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" name="lokasi" id="lokasi" placeholder="Location" value="<?= old('lokasi'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('lokasi'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fotoHotel"><i class="zmdi zmdi-upload"></i></label>
                            <input type="text" name="fotoHotel" id="fotoHotel" placeholder="Input Your Photo" style="border-bottom: none;" readonly />
                        </div>

                        <div class="form-group">
                            <input type="file" class="<?= ($validation->hasError('fotoHotel')) ? 'is-invalid' : ''; ?>" name="fotoHotel" id="fotoHotel" onchange="previewImg()" style="border-bottom: none;" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('fotoHotel'); ?>
                            </div>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Tambah Hotel" /><br><br>
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
<?= $this->extend('layout/loginregistemplate'); ?>

<?= $this->section('content'); ?>
<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form action="<?= base_url("Index/registerUser"); ?>" method="POST" enctype="multipart/form-data" class="register-form" id="register-form">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="nama"><i class="zmdi zmdi-account material-icons-name "></i></label>
                            <input type="text" class="<?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" placeholder="Name" value="<?= old('nama'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="<?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="Email" value="<?= old('email'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="<?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password" value="<?= old('password'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="<?= ($validation->hasError('retypePass')) ? 'is-invalid' : ''; ?>" name="retypePass" id="retypePass" placeholder="Confirm Password" value="<?= old('retypePass'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('retypePass'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggalLahir"><i class="zmdi zmdi-calendar"></i></label>
                            <input type="text" class="<?= ($validation->hasError('tanggalLahir')) ? 'is-invalid' : ''; ?>" name="tanggalLahir" id="tanggalLahir" placeholder="Birth Date" onfocus="(this.type='date')" value="<?= old('tanggalLahir'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggalLahir'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nomorTelepon"><i class="zmdi zmdi-phone"></i></label>
                            <input type="text" class="<?= ($validation->hasError('nomorTelepon')) ? 'is-invalid' : ''; ?>" name="nomorTelepon" id="nomorTelepon" placeholder="Phone Number" value="<?= old('nomorTelepon'); ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('nomorTelepon'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fotoUser"><i class="zmdi zmdi-upload"></i></label>
                            <input type="text" name="fotoUser" id="fotoUser" placeholder="Input Your Photo" style="border-bottom: none;" readonly />
                        </div>
                        <div class="form-group">
                            <input type="file" class="<?= ($validation->hasError('fotoUser')) ? 'is-invalid' : ''; ?>" name="fotoUser" id="fotoUser" style="border-bottom: none;" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('fotoUser'); ?>
                            </div>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" /><br><br>
                            <p>
                                <a href="<?= base_url('index/login'); ?>">I Already Have an Account !</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="<?= base_url('assets/images/gk_ada_bg.png'); ?>" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
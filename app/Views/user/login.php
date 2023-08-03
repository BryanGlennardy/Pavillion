<?= $this->extend('layout/loginregistemplate'); ?>

<?= $this->section('content'); ?>

<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="<?= base_url('assets/images/gk_ada_bg.png'); ?>" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                    <form action="<?= base_url("Index/loginUser"); ?>" method="POST" class="register-form" id="login-form">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="<?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="Email" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-danger my-3" role="alert">
                                <?= session()->getFlashdata('message'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="<?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" /><br><br>
                            <p>
                                <a href="<?= base_url('index/addRegister'); ?>">Dont Have an Account ?</a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
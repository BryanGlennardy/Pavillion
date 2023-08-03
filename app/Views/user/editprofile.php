<?= $this->extend('layout/editprofiletemplate'); ?>

<?= $this->section('editprofile'); ?>
<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-md navbar-dark navbar-custom top-nav-collapse">
	<a class="navbar-nav" id="navbarNav" style="color: white;">Pavilion Hotel</a>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="hotel.php">Hotel</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="aboutus.php">About Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Log Out</a>
			</li>
		</ul>
	</div>
</nav> -->
<!-- End Navbar -->

<!-- Edit Profile -->
<div class="container">
	<div class="row gutters">
		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
			<div class="card h-100">
				<div class="card-body">
					<div class="account-settings">
						<div class="user-profile">
							<div class="user-avatar">
								<img src="<?= base_url(session()->get('foto')); ?>" alt="img">
							</div>
							<h5 class="user-name"><?= session()->get('nama'); ?></h5>
							<h6 class="user-email"><?= session()->get('email'); ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
			<div class="card h-100">
				<div class="card-body">
					<form action="<?= base_url('index/doEditProfile'); ?>" method="POST" enctype="multipart/form-data" class="register-form" id="register-form">
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<h6 class="mb-2 text-primary">Personal Details</h6>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group ">
									<label for="nama">Full Name</label>
									<input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Enter full name" value="<?= (old('nama')) ? old('nama') : session()->get('nama') ?>">
									<div class="invalid-feedback">
										<?= $validation->getError('nama'); ?>
									</div>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= (old('email')) ? old('email') : session()->get('email') ?>" disabled>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="password">Password</label>
									<input type="text" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Enter Password" value="<?= old('password') ?>">
									<div class="invalid-feedback">
										<?= $validation->getError('password'); ?>
									</div>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="tanggalLahir">Birth Date</label>
									<input type="date" class="form-control <?= ($validation->hasError('tanggalLahir')) ? 'is-invalid' : ''; ?>" id="tanggalLahir" name="tanggalLahir" placeholder="Enter Birthdate" value="<?= (old('tanggalLahir')) ? old('tanggalLahir') : session()->get('tanggalLahir') ?>">
									<div class=" invalid-feedback">
										<?= $validation->getError('tanggalLahir'); ?>
									</div>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="nomorTelepon">Phone Number</label>
									<input type="text" class="form-control <?= ($validation->hasError('nomorTelepon')) ? 'is-invalid' : ''; ?>" id="nomorTelepon" name="nomorTelepon" placeholder="Enter phone number" value="<?= (old('nomorTelepon')) ? old('nomorTelepon') : session()->get('nomorTelepon') ?>">
									<div class="invalid-feedback">
										<?= $validation->getError('nomorTelepon'); ?>
									</div>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="fotoUser">Profile Photo</label>
									<input type="file" class="form-control <?= ($validation->hasError('fotoUser')) ? 'is-invalid' : ''; ?>" id="fotoUser" name="fotoUser" placeholder="Enter profile photo">
									<div class="invalid-feedback">
										<?= $validation->getError('fotoUser'); ?>
									</div>
								</div>
							</div>

							<div class="container-fluid">
								<button style="text-decoration: none;" type="button submit" id="submit" name="submit" class="btn btn-primary btn-block">Update</button>
								<a href="<?= base_url(); ?>" style="text-decoration: none;" type="button" id="submit" name="submit" class="btn btn-danger btn-block">Cancel</a>
							</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>
</div>
<?= $this->endSection(); ?>
<?= $this->extend('layout/indextemplate'); ?>

<?= $this->section('indexcontent'); ?>
<div id="fh5co-wrapper">
	<div id="fh5co-page">
		<div id="fh5co-header">
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo" style="color: white;">Pavilion Hotel</h1>
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li><a href="<?= base_url(); ?>">Home</a></li>
								<li><a class="active" href="<?= base_url('index/showAllHotel'); ?>">Hotel</a></li>
								<li><a href="<?= base_url('index/aboutusPage'); ?>">About Us</a></li>
								<?php if (!session()->get('log_sess')) { ?>
									<li><a href="<?= base_url('index/login'); ?>">Login</a></li>
								<?php } else { ?>
									<li><a href="<?= base_url('index/bookingHistory'); ?>">History</a></li>
									<li><a href="<?= base_url('index/editProfile'); ?>">Edit Profile</a></li>
									<li><a href="">halo, <?= session()->get('nama'); ?></a></li>
									<li><a href="<?= base_url('index/logoutUser'); ?>">Logout</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>
			</header>
		</div>
		<!-- end:fh5co-header -->
		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
					<li style="background-image: url(<?= base_url('assets/images/hotelw3.jpg'); ?>);">
						<div class="overlay-gradient"></div>
						<div class="container">
							<div class="col-md-12 col-md-offset-0 text-center slider-text">
								<div class="slider-text-inner js-fullheight">
									<div class="desc">
										<p><span>Pavilion Hotel</span></p>
										<h2>Reserve Room for Family Vacation</h2>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(<?= base_url('assets/images/hotelw2.jpg'); ?>);">
						<div class="overlay-gradient"></div>
						<div class="container">
							<div class="col-md-12 col-md-offset-0 text-center slider-text">
								<div class="slider-text-inner js-fullheight">
									<div class="desc">
										<p><span>Pavilion Hotel</span></p>
										<h2>Make Your Vacation Comfortable</h2>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(<?= base_url('assets/images/hotelw1.jpg'); ?>);">
						<div class="overlay-gradient"></div>
						<div class="container">
							<div class="col-md-12 col-md-offset-0 text-center slider-text">
								<div class="slider-text-inner js-fullheight">
									<div class="desc">
										<p><span>Pavilion Hotel</span></p>
										<h2>A Best Place To Enjoy Your Life</h2>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside><br><br><br>
		<div id="fh5co-hotel-section">
			<div class="container">

				<!-- <div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</button>
					<div class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenu2">
						<button class="dropdown-item" type="button">Action</button>
						<button class="dropdown-item" type="button">Another action</button>
						<button class="dropdown-item" type="button">Something else here</button>
					</div>
				</div> -->

				<?php foreach ($result as $row) : ?>
					<div class="col-md-4">
						<div class="hotel-content">
							<div class="hotel-grid" style="background-image: url(<?= base_url($row['fotoHotel']) ?>);">
								<div class="price"><small>For as low as</small><span>Rp<?= $row['harga'] ?></span></div>
								<a class="book-now text-center" href="<?= base_url('admin/addBookingAdmin/' . $row['idHotel']); ?>"><i class="ti-calendar"></i> Book Now</a>
							</div>
							<div class="desc" style="height: 70vh;">
								<h4><?= $row['lokasi']; ?></h4>
								<h3><?= $row['namaHotel']; ?></h3>
								<h3>Rating :
									<?php for ($i = 0; $i < $row['rating']; $i++) { ?>
										<i class="zmdi zmdi-star"></i>
									<?php } ?>
								</h3>

								<ul>
									<?php $fasilitas = explode(',', $row['fasilitas']);
									foreach ($fasilitas as $point) { ?>
										<li><?= $point; ?></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<!-- END fh5co-page -->

</div>
<!-- END fh5co-wrapper -->

<footer>
	<p class="text-center" style="color: orangered;">Copyright Allright Reserved © 2021</p>
</footer>

<?= $this->endSection(); ?>
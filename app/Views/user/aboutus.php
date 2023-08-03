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
								<li><a href="<?= base_url('index/showAllHotel'); ?>">Hotel</a></li>
								<li><a class="active" href="<?= base_url('index/aboutusPage'); ?>">About Us</a></li>
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
		<div class="fh5co-parallax" style="background-image: url(<?= base_url('assets/images/hotelw2.jpg'); ?>);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">Our Teams</h1>
							<p>About Our Teams Role</p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="fh5co-blog-section">
			<div class="container">
				<div class="row">

					<div class="col-md-4">
						<div class="blog-grid" style="background-image: url(<?= base_url('assets/images/Marvel.jpg'); ?>); height: 400px;">
						</div>
						<div class="desc">
							<p class="text-center"> Marvel Abysha Polla / 00000041628 / Front End Developer</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="blog-grid" style="background-image: url(<?= base_url('assets/images/bryan.png'); ?>); height: 400px;">
						</div>
						<div class="desc">
							<p class="text-center">Bryan Glennardy / 00000036471 / Full Stack Developer</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="blog-grid" style="background-image: url(<?= base_url('assets/images/Ardhi.jpg'); ?>); height: 400px;">
						</div>
						<div class="desc">
							<p class="text-center">Thenardhi Syechlo / 00000036583 / Front End Developer</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="blog-grid" style="background-image: url(<?= base_url('assets/images/willy.jpg'); ?>);">
						</div>
						<div class="desc">
							<p class="text-center"> Willyam / 00000034868 / Full Stack Developer</p>
						</div>
					</div>
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
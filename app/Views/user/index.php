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
								<li><a class="active" href="index.php">Home</a></li>
								<li><a href="<?= base_url('index/showAllHotel'); ?>">Hotel</a></li>
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
		<div id="hotel-facilities">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h2>Hotel Facilities</h2>
						</div>
					</div>
				</div>

				<div id="tabs">

					<nav class="tabs-nav m-auto">
						<a href="#" class="active" data-tab="tab1">
							<i class="flaticon-restaurant icon"></i>
							<span>Restaurant</span>
						</a>
						<a href="#" data-tab="tab2">
							<i class="flaticon-cup icon"></i>
							<span>Bar</span>
						</a>
						<a href="#" data-tab="tab3">
							<i class="flaticon-car icon"></i>
							<span>Pick Up</span>
						</a>
						<a href="#" data-tab="tab4">

							<i class="flaticon-swimming icon"></i>
							<span>Swimming Pool</span>
						</a>
						<a href="#" data-tab="tab5">

							<i class="flaticon-massage icon"></i>
							<span>Spa</span>
						</a>
						<a href="#" data-tab="tab6">

							<i class="flaticon-bicycle icon"></i>
							<span>Gym</span>
						</a>
					</nav>

					<div class="tab-content-container">
						<div class="tab-content active show" data-tab-content="tab1">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<img src="<?= base_url('assets/images/restoran2.jpeg'); ?>" class="img-responsive" alt="Image">
									</div>
									<div class="col-md-6">
										<span class="super-heading-sm">Pavilion Hotel</span>
										<h3 class="heading">Restaurant</h3>
										<p>Hotel kami memiliki restoran dengan pelayanan dan makanan terbaik yang pernah ada.
											Masakan dari restoran kami akan memanjakan lidah anda dengan menu-menu terbaik yang kami punya.
											Anda juga akan di manjakan dengan pelayanan terbaik dari hotel kami.</p>


									</div>
								</div>
							</div>
						</div>
						<div class="tab-content" data-tab-content="tab2">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<img src="<?= base_url('assets/images/bar.jpeg'); ?>" class="img-responsive" alt="Image">
									</div>
									<div class="col-md-6">
										<span class="super-heading-sm">Pavilion Hotel</span>
										<h3 class="heading">Bars</h3>
										<p>Hotel kami memiliki bar dengan minuman-minuman dengan merk kelas International.
											Minuman-minuman ini kami dapatkan dengan Import dari Luar negeri.</p>

									</div>
								</div>
							</div>
						</div>
						<div class="tab-content" data-tab-content="tab3">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<img src="<?= base_url('assets/images/pickup.jpg'); ?>" class="img-responsive" alt="Image">
									</div>
									<div class="col-md-6">
										<span class="super-heading-sm">Pavilion Hotel</span>
										<h3 class="heading">Pick Up</h3>
										<p>Hotel kami memiliki layanan antar jemput untuk anda. Kami menyediakan mobil
											High Class agar dapat memanjakan anda selama di perjalanan dan membuat anda merasa nyaman selama diperjalanan
											hingga tiba di tempat tujuan.</p>


									</div>
								</div>
							</div>
						</div>
						<div class="tab-content" data-tab-content="tab4">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<img src="<?= base_url('assets/images/kolamrenang3.jpeg'); ?>" class="img-responsive" alt="Image">
									</div>
									<div class="col-md-6">
										<span class="super-heading-sm">Pavilion Hotel</span>
										<h3 class="heading">Swimming Pool</h3>
										<p>Hotel kami menyediakan Fasilitas kolam renang terbaik dengan pemandangan yang indah kepada anda.
											Kami menyediakan kolam renang ini agar dapat memanjakan anda selama berada di hotel kami.</p>


									</div>
								</div>
							</div>
						</div>
						<div class="tab-content" data-tab-content="tab5">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<img src="<?= base_url('assets/images/spa.jpg'); ?>" class="img-responsive" alt="Image">
									</div>
									<div class="col-md-6">
										<span class="super-heading-sm">Pavilion Hotel</span>
										<h3 class="heading">Spa</h3>
										<p>Hotel kami menyediakan fasilitas spa untuk anda. Ketika anda stress, anda bisa datang ke Spa Room untuk menikmati
											pelayanan Spa dari hotel kami. Kami memberikan pelayanan Spa yang terbaik kepada anda yang membuat anda tidak akan melupakan
											pengalaman selama berada di hotel kami.</p>


									</div>
								</div>
							</div>
						</div>
						<div class="tab-content" data-tab-content="tab6">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<img src="<?= base_url('assets/images/fitnescenter.jpeg'); ?>" class="img-responsive" alt="Image">
									</div>
									<div class="col-md-6">
										<span class="super-heading-sm">Pavilion Hotel</span>
										<h3 class="heading">Gym</h3>
										<p>Hotel kami menyediakan tempat Gym bagi anda yang suka berolahraga. Fasilitas peralatan Gym hotel kami sangat lengkap dengan
											ruangan yang sangat baik. Kami juga menyediakan instruktur bagi anda.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="testimonial">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h2>Testimonial From Customer</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="testimony">
							<blockquote>
								&ldquo;If you’re looking for a top quality hotel look no further. We were upgraded free of charge to the Premium Suite, thanks so much&rdquo;
							</blockquote>
							<p class="author"><cite>Alexander Danison</cite></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="testimony">
							<blockquote>
								&ldquo;Me and my wife had a delightful weekend get away here, the staff were so friendly and attentive. Highly Recommended&rdquo;
							</blockquote>
							<p class="author"><cite>Michael Oe</cite></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="testimony">
							<blockquote>
								&ldquo;If you’re looking for a top quality hotel look no further. We were upgraded free of charge to the Premium Suite, thanks so much&rdquo;
							</blockquote>
							<p class="author"><cite>Michelle Davin</cite></p>
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
	<p class="text-center" style="color: orangered; padding-top: 25px;">Copyright Allright Reserved © 2021</p>
</footer>
<?= $this->endSection(); ?>
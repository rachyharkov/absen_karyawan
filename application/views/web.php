<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title><?= strtoupper($sett_apps->nama_perusahaan) ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="shortcut icon" href="<?= base_url() ?>assets/web/img/styleswitcher/load.png">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/web/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/web/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/web/css/magnific-popup.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/web/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/web/css/skins/green.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/web/js/plugins/revolution/css/settings.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/web/js/plugins/revolution/css/layers.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/web/js/plugins/revolution/css/navigation.css" />
	<link rel="alternate stylesheet" type="text/css" title="green" href="<?= base_url() ?>assets/web/css/skins/green.css" />








	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/modernizr.js"></script>
	<meta name="google-site-verification" content="IaH9QtvCWsCB6oZGzDg3cOGalkKOLkcckWTYRbE646c" />

</head>

<body class="normal">
	<!-- Preloader Starts -->
	<div class="preloader" id="preloader">
		<div class="logopreloader">
			<img src="<?= base_url() ?>assets/web/img/styleswitcher/load.png" alt="logo-black" style="width: 300px;margin-bottom: 100px;">
		</div>
		<div class="loader" id="loader"></div>
	</div>
	<div class="wrapper">
		<header id="header" class="header">
			<div class="header-inner">
				<nav class="navbar navbar-expand-lg p-0" id="singlepage-nav">
					<div class="logo">
						<a data-toggle="collapse" data-target=".navbar-collapse.show" class="navbar-brand link-menu scroll-to-target" href="#mainslider">
							<img id="logo-light" class="logo-light" src="<?= base_url() ?>assets/web/img/styleswitcher/logos/green.png" alt="logo-light" />
							<img id="logo-dark" class="logo-dark" src="<?= base_url() ?>assets/web/img/styleswitcher/logos/logos-dark/green.png" alt="logo-dark" />
						</a>
					</div>
					<button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span id="icon-toggler">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>
					<div class="collapse navbar-collapse nav-menu" id="navbarSupportedContent">
						<ul class="nav-menu-inner ml-auto">
							<li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#mainslider"><i class="fa fa-home"></i> home</a></li>
							<li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#about"><i class="fa fa-user"></i> about</a></li>
							<li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#services"><i class="fa fa-cog"></i> our services</a></li>
							<li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#portfolio"><i class="fa fa-image"></i> portfolio</a></li>
							<li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#team"><i class="fa fa-user"></i> our team</a></li>
							<li><a data-toggle="collapse" data-target=".navbar-collapse.show" class="link-menu" href="#contact"><i class="fa fa-envelope"></i> contact</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<section class="mainslider" id="mainslider">
			<div class="rev_slider_wrapper fullwidthbanner-container dark-slider" data-alias="vimeo-hero" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
				<div id="rev_slider" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
					<ul>

						<?php foreach ($slider_data as $slider) { ?>
							<li data-index="rs-<?= $slider->slider_id ?>" data-transition="zoomin" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?= base_url() ?>assets/web/img/slider/<?= $slider->photo ?>" data-rotate="0" data-saveperformance="off" data-title="Ken Burns" data-description="">
								<img alt="" src="<?= base_url() ?>assets/web/img/slider/<?= $slider->photo ?>" data-bgposition="center center" data-kenburns="on" data-duration="20000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="180" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
								<div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['70','70','70','45']" data-lineheight="['70','70','70','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap;"><?= strtoupper($slider->title) ?>
								</div>
								<div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0 nowrap-normal text-center px-15" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['70','70','70','70']" data-width="none" data-height="none" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6;"><?= strtoupper($slider->span_title) ?>
								</div>
								<div class="tp-caption NotGeneric-Icon   tp-resizeme rs-parallaxlevel-0" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-style_hover="cursor:default;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="2000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;"><i class="pe-7s-refresh"></i>
								</div>
								<div class="tp-caption" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['150','210','210','180']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);" data-transform_in="y:100px;sX:1;sY:1;opacity:0;s:2000;e:Power3.easeInOut;" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;" data-start="750" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-responsive="off" style="z-index: 11; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><a href="#about" class="custom-button slider-button scroll-to-target">learn more about us</a></div>
							</li>
						<?php } ?>
					</ul>
					<div class="tp-static-layers"></div>
					<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
				</div>
			</div>
		</section>
		<section id="about" class="about">
			<div class="container">
				<div class="text-center top-text">
					<h1><span>About</span> Us</h1>
					<h4>Who We Are</h4>
				</div>
				<div class="divider text-center">
					<span class="outer-line"></span>
					<span class="fa fa-user" aria-hidden="true"></span>
					<span class="outer-line"></span>
				</div>
				<div class="row about-content">
					<div class="col-sm-12 col-md-12 col-lg-6 about-left-side">
						<h3 class="title-about"><strong><?= strtoupper($sett_apps->nama_perusahaan) ?></strong></h3>
						<hr>
						<p style="text-align: justify;"><?= $about->description ?></p>
						<ul class="nav nav-tabs">
							<li><a class="active" data-toggle="tab" href="#menu1">CORE VALUES</a></li>
							<li><a data-toggle="tab" href="#menu2">VISION</a></li>
							<li><a data-toggle="tab" href="#menu3">MISSION</a></li>
						</ul>
						<div class="tab-content">
							<div id="menu1" class="tab-pane fade in active">
								<p> <strong>Integrity</strong>
								<ol>We do the right things</ol>
								</p>
								<p><strong>Accountability</strong>
								<ol>We hold ourselves responsible for what we do.</ol>
								</p>
								<p><strong>Commitment</strong>
								<ol>we are committed to deliver quality services in positive working environment.</ol>
								</p>
							</div>
							<div id="menu2" class="tab-pane fade">
								<p> <strong>Becoming the most preferred claim service provider in Indonesia.</strong> </p>
								<p> <strong>We become the primary choice of claim service provider in insurance business.</strong> </p>
								<p> <strong>Better in quality, reliability, competency, coverage, responsiveness.</strong> </p>
							</div>
							<div id="menu3" class="tab-pane fade">
								<p> <strong>We deliver trusted claim services for insurance business throughout Indonesia.</strong>
								<ol>Trust means reliability, truth, ability</ol>
								<ol>Our services meet the client’s requirements (SLA).</ol>
								<ol>We provide impartial & justified claim solution to the client</ol>
								</p>
								<p> <strong>We provide a stimulating and rewarding working environment for the staff.</strong> </p>
								<p> <strong>We build a great firm that attracts, develops, excites and retains outstanding people.</strong> </p>
							</div>
						</div>
						<a class="custom-button scroll-to-target" href="#portfolio">Our Portfolio</a>
					</div>
					<div class="col-md-12 col-lg-6 about-right">
						<div class="about-right-side">
							<img class="img-fluid" src="<?= base_url() ?>assets/web/img/about/<?= $about->photo ?>" alt="">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="projectmanager" id="projectmanager">
			<div class="section-overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-12 col-xl-5">
							<img class="img-fluid projectmanagerpicture" src="<?= base_url() ?>assets/web/img/<?= $affilation->photo ?>" alt="">
						</div>
						<div class="col-md-12 col-lg-12 col-xl-6 offset-xl-1">
							<h1>AFFILATION</h1>
							<blockquote style="text-align: justify;">
								<?= $affilation->description ?>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="services" class="services">
			<div class="container">
				<div class="text-center top-text">
					<h1><span>Our</span> Services</h1>
					<h4>What We Doing</h4>
				</div>
				<div class="divider text-center">
					<span class="outer-line"></span>
					<span class="fa fa-cogs" aria-hidden="true"></span>
					<span class="outer-line"></span>
				</div>
				<div class="row services-box">
					<?php foreach ($service_data as $service) { ?>
						<div class="col-lg-3 col-md-12 col-sm-12 services-box-item">
							<span class="services-box-item-cover <?= $service->icon ?>" data-headline="<?= $service->service_name ?>"></span>
							<div class="services-box-item-content <?= $service->icon ?>" style="height: 100%;width: 100%;">
								<h2><?= $service->service_name ?></h2>

								<?php $no = 1;
								$query = $this->db->query("SELECT * from service_detail where service_id='$service->service_id'");
								foreach ($query->result() as $row) { ?>
									<p><?= $no++ ?>. <?= $row->service_detail_name ?></p>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<section id="portfolio" class="portfolio">
			<div class="container">
				<div class="text-center top-text">
					<h1><span>Our</span> Portfolio</h1>
					<h4>Our latest Works</h4>
				</div>
				<div class="divider text-center">
					<span class="outer-line"></span>
					<span class="fa fa-image" aria-hidden="true"></span>
					<span class="outer-line"></span>
				</div>
				<nav>
					<ul class="simplefilter nav nav-pills d-block">
						<li class="active" data-filter="all"><i class="fa fa-reorder"></i> All Projects</li>
						<?php foreach ($service_data_grup->result() as $row) { ?>
							<li style="margin-bottom: 3px;" data-filter="<?php echo $row->service_id ?>"><?php echo $row->service_name ?></li>
						<?php } ?>
					</ul>
				</nav>
				<div>
					<div>
						<div class="filtr-container">
							<?php foreach ($portfolio_data as $portfolio) { ?>
								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 filtr-item" data-category="<?= $portfolio->service_id ?>">
									<div class="magnific-popup-gallery">
										<figure class="thumbnail thumbnail__portfolio">
											<a class="image-wrap" href="<?= base_url() ?>assets/web/img/portfolio/<?= $portfolio->photo ?>" data-gal="magnific-pop-up[image]" title="Image project"><img class="img-fluid" src="<?= base_url() ?>assets/web/img/portfolio/<?= $portfolio->photo ?>" alt="Image Project" /><span class="zoom-icon"></span></a>
										</figure>
										<div class="caption">
											<h3><?= $portfolio->title ?></h3>
											<p><?= $portfolio->description ?></p>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>

					</div>
				</div>
			</div>
		</section>
		<section class="facts">
			<div class="section-overlay">
				<div class="container">
					<div class="text-center top-text">
						<h1><span>OUR</span> ACHIEVEMENTS</h1>
					</div>
					<div class="fact-badges">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<i class="fa fa-user"></i>
								<h2>
									<span><strong class="badges-counter"><?= $achievements->clients ?></strong>+</span>
								</h2>
								<h4>Clients</h4>
							</div>
							<div class="col-md-3 col-sm-6">
								<i class="fa fa-briefcase"></i>
								<h2>
									<span><strong class="badges-counter"><?= $achievements->projects ?></strong>+</span>
								</h2>
								<h4>Projects</h4>
							</div>
							<div class="col-md-3 col-sm-6">
								<i class="fa fa-gift"></i>
								<h2>
									<span><strong class="badges-counter"><?= $achievements->gifts ?></strong>+</span>
								</h2>
								<h4>GIFTS</h4>
							</div>
							<div class="col-md-3 col-sm-6">
								<i class="fa fa-home"></i>
								<h2>
									<span><strong class="badges-counter"><?= $achievements->offices ?></strong></span>
								</h2>
								<h4>Offices</h4>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<center>
							<img src="" id="photo_user" width="50%" style="border-radius: 5%;" />
							<br><br>
							<h5><b><span id="name_orang"></span></b> </h5>
							<h5><b><span id="position"></span></b> </h5>
						</center>

						<p style="text-align: justify;" id="data_bio"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<section id="team" class="team">
			<div class="container">
				<div class="text-center top-text">
					<h1><span>Our</span> Team</h1>
					<p>The company derives its main benefit from
						adjusters who have been practicing in Indonesia
						over the last 20 years. Having a qualified Senior
						Management Team ensures technical standards
						are maintained to the highest level, satisfying the
						requirements of Reinsurers locally and overseas.</p>
				</div>
				<div class="divider text-center">
					<span class="outer-line"></span>
					<span class="fa fa-users" aria-hidden="true"></span>
					<span class="outer-line"></span>
				</div>
				<ul class="nav nav-pills justify-content-center" role="tablist" style="margin-top: 10px;">
					<li class="nav-item" style="margin: 2px;">
						<button class="nav-link btn-outline-success active" data-toggle="tab" href="#executive" role="tab">Executive management</button>
					</li>
					<li class="nav-item" style="margin: 2px;">
						<button class="nav-link btn-outline-success" data-toggle="tab" href="#seniormanagement" role="tab">Senior management</button>
					</li>
					<li class="nav-item" style="margin: 2px;">
						<button class="nav-link btn-outline-success" data-toggle="tab" href="#technical" role="tab">Technical Unit</button>
					</li>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="executive" role="tabpanel">
						<div class="row">
							<?php $query = $this->db->query("SELECT * from team where position='Executive management'"); ?>
							<?php foreach ($query->result() as $row) { ?>
								<div class="col-md-3" style="margin-top:20px">
									<div class="team-member">
										<a title="weq" id="view_bio" data-toggle="modal" data-bio="<?= $row->biografi ?>" data-photo="<?= $row->photo ?>" data-name="<?= $row->name ?>" data-position="<?= $row->position ?>" data-target="#exampleModal" class="team-member-img-wrap"><img src="<?= base_url() ?>assets/web/img/team/<?= $row->photo ?>" alt="43242"></a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="tab-pane" id="seniormanagement" role="tabpanel">
						<div class="row">
							<?php $query = $this->db->query("SELECT * from team where position='Senior management'"); ?>
							<?php foreach ($query->result() as $row) { ?>
								<div class="col-md-3" style="margin-top:20px">
									<div class="team-member">
										<a title="weq" id="view_bio" data-toggle="modal" data-bio="<?= $row->biografi ?>" data-photo="<?= $row->photo ?>" data-name="<?= $row->name ?>" data-position="<?= $row->position ?>" data-target="#exampleModal" class="team-member-img-wrap"><img src="<?= base_url() ?>assets/web/img/team/<?= $row->photo ?>" alt="43242"></a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="tab-pane" id="technical" role="tabpanel">
						<div class="row">
							<?php $query = $this->db->query("SELECT * from team where position='Technical Unit'"); ?>
							<?php foreach ($query->result() as $row) { ?>
								<div class="col-md-3" style="margin-top:20px">
									<div class="team-member">
										<a title="weq" id="view_bio" data-toggle="modal" data-bio="<?= $row->biografi ?>" data-photo="<?= $row->photo ?>" data-name="<?= $row->name ?>" data-position="<?= $row->position ?>" data-target="#exampleModal" class="team-member-img-wrap"><img src="<?= base_url() ?>assets/web/img/team/<?= $row->photo ?>" alt="43242"></a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>

				</div>
		</section>
		<section id="contact" class="contact">
			<div class="container">
				<div class="text-center top-text">
					<h1><span>Contact</span> Us</h1>
					<h4>Get in Touch</h4>
				</div>
				<div class="divider text-center">
					<span class="outer-line"></span>
					<span class="fa fa-building-o" aria-hidden="true"></span>
					<span class="outer-line"></span>
				</div>
				<div class="row team-members magnific-popup-gallery">
					<?php foreach ($contact_data as $contact) { ?>
						<div class="col-md-4 col-sm-12">
							<div class="info-map-boxes-item fa fa-building-o">
								<h1><?php echo $contact->office_name ?></h1>
								<p style="text-align: justify;"> <b> <?php echo $contact->address ?></b></p>
								<hr>
								<p> <b>Phone :</b><?php echo $contact->phone ?><br>
									<b>Fax :</b> <?php echo $contact->fax ?> <br>
									<b>General Enquiry :</b> <?php echo $contact->general_enquiry ?> <br>
									<b>Contact Persons :</b><br>
									<?php echo $contact->contact_persons ?><br>
									<?php echo $contact->contact_persons2 ?>
								</p>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<section class="contactform">
			<div class="section-overlay">
				<div class="container">
					<!-- Main Heading Starts -->
					<div class="text-center top-text">
						<h1><span>Send Us</span> an email</h1>
						<h4>We are very responsive to messages</h4>
					</div>
					<div class="form-container">
						<form class="formcontact">
							<div class="row form-inputs">
								<div class="col-md-6 form-group custom-form-group">
									<span class="input custom-input">
										<input placeholder="First Name" class="input-field custom-input-field" id="first_name" autocomplete="off" name="first_name" type="text" required data-error="NEW ERROR MESSAGE">
										<label class="input-label custom-input-label">
											<i class="fa fa-user icon icon-field"></i>
										</label>
									</span>
								</div>
								<div class="col-md-6 form-group custom-form-group">
									<span class="input custom-input">
										<input placeholder="Last Name" class="input-field custom-input-field" id="last_name" autocomplete="off" name="last_name" type="text" required>
										<label class="input-label custom-input-label">
											<i class="fa fa-user-o icon icon-field"></i>
										</label>
									</span>
								</div>
								<div class="form-group custom-form-group col-md-12">
									<textarea placeholder="Message" id="message" name="message" cols="45" rows="7" required></textarea>
								</div>
								<div class="col-md-6 form-group custom-form-group">
									<span class="input custom-input">
										<input placeholder="Email" class="input-field custom-input-field" id="email" autocomplete="off" name="email" type="email" required>
										<label class="input-label custom-input-label">
											<i class="fa fa-envelope icon icon-field"></i>
										</label>
									</span>
								</div>
								<div class="col-md-6 submit-form">
									<button type="submit" class="custom-button" title="Send">Send Message</button>
								</div>
								<div class="col-sm-12 text-center output_message_holder d-none">
									<p class="output_message"></p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<footer class="footer text-center">
			<div class="container">
				<p><?= strtoupper($sett_apps->nama_perusahaan) ?></p>
				<p>
					&copy; Copyright <?= date('Y') ?> <?= $sett_apps->website ?> </a>
				</p>
				<div class="social-icons">
					<ul class="social">
						<li>
							<a class="twitter" href="#" title="twitter"></a>
						</li>
						<li>
							<a class="facebook" href="#" title="facebook"></a>
						</li>
						<li>
							<a class="google" href="#" title="google"></a>
						</li>
						<li>
							<a class="skype" href="#" title="skype"></a>
						</li>
						<li>
							<a class="instagram" href="#" title="instagram"></a>
						</li>
						<li>
							<a class="linkedin" href="#" title="linkedin"></a>
						</li>
						<li>
							<a class="youtube" href="#" title="youtube"></a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
		<div id="back-top-wrapper" class="d-none d-sm-block">
			<p id="back-top">
				<a href="index.html#top"><span></span></a>
			</p>
		</div>
	</div>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/jquery.easing.1.3.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyAFnEvJfyoQ8unR5hK1u87h73EdYP46-hE"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/jquery.filterizr.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/jquery.singlePageNav.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/web/js/custom.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script type="text/javascript">
		(function() {
			"use strict";
			var tpj = jQuery;
			var revapi4;
			tpj(document).ready(function() {
				if (tpj("#rev_slider").revolution == undefined) {
					revslider_showDoubleJqueryError("#rev_slider");
				} else {
					revapi4 = tpj("#rev_slider").show().revolution({
						sliderType: "standard",
						jsFileLocation: "js/plugins/revolution/js/",
						dottedOverlay: "none",
						sliderLayout: "fullscreen",
						delay: 9000,
						navigation: {
							keyboardNavigation: "off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation: "off",
							onHoverStop: "off",
							touch: {
								touchenabled: "on",
								swipe_threshold: 75,
								swipe_min_touches: 1,
								swipe_direction: "horizontal",
								drag_block_vertical: false
							},
							arrows: {
								style: "zeus",
								enable: true,
								hide_onmobile: true,
								hide_under: 600,
								hide_onleave: true,
								hide_delay: 200,
								hide_delay_mobile: 1200,
								tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
								left: {
									h_align: "left",
									v_align: "center",
									h_offset: 90,
									v_offset: 0
								},
								right: {
									h_align: "right",
									v_align: "center",
									h_offset: 90,
									v_offset: 0
								}
							},
							bullets: {
								enable: false,
								hide_onmobile: true,
								hide_under: 600,
								style: "metis",
								hide_onleave: true,
								hide_delay: 200,
								hide_delay_mobile: 1200,
								direction: "horizontal",
								h_align: "center",
								v_align: "bottom",
								h_offset: 0,
								v_offset: 30,
								space: 5,
								tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span>'
							}
						},
						viewPort: {
							enable: true,
							outof: "pause",
							visible_area: "80%"
						},
						responsiveLevels: [1240, 1024, 778, 480],
						gridwidth: [1240, 1024, 778, 480],
						gridheight: [600, 600, 500, 400],
						lazyType: "none",
						parallax: {
							type: "mouse",
							origo: "slidercenter",
							speed: 2000,
							levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
						},
						shadow: 0,
						spinner: "off",
						stopLoop: "off",
						stopAfterLoops: -1,
						stopAtSlide: -1,
						shuffle: "off",
						hideThumbsOnMobile: "off",
						autoHeight: "off",
						hideSliderAtLimit: 0,
						hideCaptionAtLimit: 0,
						hideAllCaptionAtLilmit: 0,
						debugMode: false,
						fallbacks: {
							simplifyAll: "off",
							nextSlideOnWindowFocus: "off",
							disableFocusListener: false,
						}
					});
				}
			});
		})(jQuery);
	</script>
	<script>
		$(document).ready(function() {
			$('.slider').slick({
				dots: true,
				autoplay: true,
				autoplaySpeed: 1500,
				slidesToShow: 3,
				slidesToScroll: 1,
			});
		});
	</script>
</body>

</html>


<script>
	$(".formcontact").on("submit", function() {
		$(".output_message").text("Loading...");
		var form = $(this);
		$.ajax({
			url: "<?= base_url() ?>web/contact_save",
			type: "POST",
			data: form.serialize(),
			dataType: "json",
			success: function(result) {
				if (result.success == true) {
					$(".formcontact").find(".output_message_holder").addClass("d-block");
					$(".formcontact").find(".output_message").addClass("success");
					$(".output_message").text("Message Sent!");
				} else {
					$(".formcontact").find(".output_message_holder").addClass("d-block");
					$(".formcontact").find(".output_message").addClass("error");
					$(".output_message").text("Error Sending email!");
				}
				$("#first_name").val('')
				$("#last_name").val('')
				$("#message").val('')
				$("#email").val('')
			}
		});

		return false;
	});
</script>

<script type="text/javascript">
	$(document).on('click', '#view_bio', function() {
		var bio = $(this).data('bio');
		var name = $(this).data('name');
		var position = $(this).data('position');
		var photo = $(this).data('photo');

		console.log(photo)
		$('#exampleModal #data_bio').text(bio);
		$('#exampleModal #name_orang').text(name);
		$('#exampleModal #position').text(position);
		$('#exampleModal #photo_user').attr("src", "assets/web/img/team/" + photo);
	})
</script>

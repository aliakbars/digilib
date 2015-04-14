<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Digilib</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
	<meta name="author" content="ITB Student Orchestra" />
	<link id="theme" href="<?php echo base_url(); ?>/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link id="theme" href="<?php echo base_url(); ?>/public/css/main.css" rel="stylesheet" type="text/css">
	<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}
	</style>
</head>

<body>
	<div id="dic_bubble" class="selection_bubble fontSize13 noSelect" style="z-index: 9999; border: 1px solid rgb(74, 174, 222); visibility: hidden;"></div>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="<?php echo site_url(); ?>">Digital Library</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li id="nav-repertoire"><a href="<?php echo site_url(); ?>"><i class="icon-home"></i> Home</a></li>
						<?php if ($level <= 2) { ?>
						<li id="nav-uploader"><a href="<?php echo site_url(); ?>/uploader"><i class="icon-upload"></i> Uploader</a></li>
						<?php } ?>
						<li id="nav-about"><a href="<?php echo site_url(); ?>/about"><i class="icon-user"></i> About</a></li>
					</ul>
				</div><!--/.nav-collapse -->
				<a class="btn pull-right" href="<?php echo site_url(); ?>/logout">Logout</a>
			</div>
		</div>
	</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Inovasi Mapping</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link id="theme" href="<? echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link id="theme" href="<? echo base_url(); ?>public/css/main.css" rel="stylesheet" type="text/css">
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
				<a class="brand" href="<?php echo site_url(); ?>">ISI</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li id="nav-repertoire"><a href="<? echo base_url(); ?>maps/table"><i class="icon-home"></i> Home</a></li>
						<li id="nav-about"><a href="<? echo base_url(); ?>maps"><i class="icon-map-marker"></i> Map</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<form action="<? echo site_url(); ?>/post" method="post" enctype="multipart/form-data" class="form-horizontal">
			<fieldset>
			<legend>Personality</legend>
				<div class="control-group">
					<label class="control-label" for="input-id">ID</label>
					<div class="controls">
						<input id="input-id" name="id" type="text" maxlength="2">
						<span id="id-help" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer1">1</label>
					<div class="controls">
						<input id="input-answer1" name="answer1" type="text" maxlength="1">
						<span id="id-answer1" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer2">2</label>
					<div class="controls">
						<input id="input-answer2" name="answer2" type="text" maxlength="1">
						<span id="id-answer2" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer3">3</label>
					<div class="controls">
						<input id="input-answer3" name="answer3" type="text" maxlength="1">
						<span id="id-answer3" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer4">4</label>
					<div class="controls">
						<input id="input-answer4" name="answer4" type="text" maxlength="1">
						<span id="id-answer4" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer5">5</label>
					<div class="controls">
						<input id="input-answer5" name="answer5" type="text" maxlength="1">
						<span id="id-answer5" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer6">6</label>
					<div class="controls">
						<input id="input-answer6" name="answer6" type="text" maxlength="1">
						<span id="id-answer6" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer7">7</label>
					<div class="controls">
						<input id="input-answer7" name="answer7" type="text" maxlength="1">
						<span id="id-answer7" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer8">8</label>
					<div class="controls">
						<input id="input-answer8" name="answer8" type="text" maxlength="1">
						<span id="id-answer8" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer9">9</label>
					<div class="controls">
						<input id="input-answer9" name="answer9" type="text" maxlength="1">
						<span id="id-answer9" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer10">10</label>
					<div class="controls">
						<input id="input-answer10" name="answer10" type="text" maxlength="1">
						<span id="id-answer10" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer11">11</label>
					<div class="controls">
						<input id="input-answer11" name="answer11" type="text" maxlength="1">
						<span id="id-answer11" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer12">12</label>
					<div class="controls">
						<input id="input-answer12" name="answer12" type="text" maxlength="1">
						<span id="id-answer12" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer13">13</label>
					<div class="controls">
						<input id="input-answer13" name="answer13" type="text" maxlength="1">
						<span id="id-answer13" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer14">14</label>
					<div class="controls">
						<input id="input-answer14" name="answer14" type="text" maxlength="1">
						<span id="id-answer14" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer15">15</label>
					<div class="controls">
						<input id="input-answer15" name="answer15" type="text" maxlength="1">
						<span id="id-answer15" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer16">16</label>
					<div class="controls">
						<input id="input-answer16" name="answer16" type="text" maxlength="1">
						<span id="id-answer16" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer17">17</label>
					<div class="controls">
						<input id="input-answer17" name="answer17" type="text" maxlength="1">
						<span id="id-answer17" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer18">18</label>
					<div class="controls">
						<input id="input-answer18" name="answer18" type="text" maxlength="1">
						<span id="id-answer18" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer19">19</label>
					<div class="controls">
						<input id="input-answer19" name="answer19" type="text" maxlength="1">
						<span id="id-answer19" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-answer20">20</label>
					<div class="controls">
						<input id="input-answer20" name="answer20" type="text" maxlength="1">
						<span id="id-answer20" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-score">Score</label>
					<div class="controls">
						<input id="input-score" name="score" type="text" maxlength="2" readonly>
						<span id="id-score" class="help-inline"></span>
					</div>
				</div>
				<div class="form-actions" style="margin-bottom:-20px">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</fieldset>
		</form>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/main.js"></script>
</body>

</html>

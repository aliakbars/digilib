	<div class="container">
		<h1><?php echo $desc['title'] ?></h1>
		<legend>Description</legend>
		<strong>Composer</strong>
		<p><?php echo $desc['composer'] ?></p>
		<strong>Arranger</strong>
		<p><?php echo $desc['arranger'] ?></p>
		<strong>Format</strong>
		<p><?php echo $desc['format'] ?></p>
		<strong>Tags</strong>
		<p><?php echo $desc['tags'] ?></p>
		<strong>Year</strong>
		<p><?php echo $desc['year'] ?></p>
		<legend style="margin-bottom:0">Instruments</legend>
		<div class="control-group">
			<label class="control-label"><strong>Strings</strong></label>
			<div class="controls">
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="violin" name="violin" disabled <?php echo $instruments['violin'] ? 'checked' : null; ?>> Violin
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="viola" name="viola" disabled <?php echo $instruments['viola'] ? 'checked' : null; ?>> Viola
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="violoncello" name="violoncello" disabled <?php echo $instruments['violoncello'] ? 'checked' : null; ?>> Violoncello
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="contrabass" name="contrabass" disabled <?php echo $instruments['contrabass'] ? 'checked' : null; ?>> Contrabass
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><strong>Woodwind</strong></label>
			<div class="controls">
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="flute" name="flute" disabled <?php echo $instruments['flute'] ? 'checked' : null; ?>> Flute
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="clarinet" name="clarinet" disabled <?php echo $instruments['clarinet'] ? 'checked' : null; ?>> Clarinet
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="oboe" name="oboe" disabled <?php echo $instruments['oboe'] ? 'checked' : null; ?>> Oboe
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="bassoon" name="bassoon" disabled <?php echo $instruments['bassoon'] ? 'checked' : null; ?>> Bassoon
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><strong>Brass</strong></label>
			<div class="controls">
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="trumpet" name="trumpet" disabled <?php echo $instruments['trumpet'] ? 'checked' : null; ?>> Trumpet
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="trombone" name="trombone" disabled <?php echo $instruments['trombone'] ? 'checked' : null; ?>> Trombone
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="tuba" name="tuba" disabled <?php echo $instruments['tuba'] ? 'checked' : null; ?>> Tuba
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="horn" name="horn" disabled <?php echo $instruments['horn'] ? 'checked' : null; ?>> Horn
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="otherbrass" name="otherbrass" disabled <?php echo $instruments['otherbrass'] ? 'checked' : null; ?>> Other brass
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><strong>Others</strong></label>
			<div class="controls">
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="otherpercussion" name="otherpercussion" disabled <?php echo $instruments['otherpercussion'] ? 'checked' : null; ?>> Other percussion
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="timpani" name="timpani" disabled <?php echo $instruments['timpani'] ? 'checked' : null; ?>> Timpani
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="piano" name="piano" disabled <?php echo $instruments['piano'] ? 'checked' : null; ?>> Piano
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="guitar" name="guitar" disabled <?php echo $instruments['guitar'] ? 'checked' : null; ?>> Guitar
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="choir" name="choir" disabled <?php echo $instruments['choir'] ? 'checked' : null; ?>> Choir
				</label>
			</div>
		</div>
		<div class="form-actions" style="margin-bottom:0px">
			<a class="btn btn-primary" href="<?php echo base_url(); ?>public/library<?php echo $desc['location']; ?>"><i class="icon-download icon-white"></i> Download</a>
			<?php if ($level <= 2) { ?>
			<a class="btn btn-inverse" href="<?php echo site_url(); ?>/uploader/editor/<?php echo $desc['id'] ?>"><i class="icon-edit icon-white"></i> Edit</a>
			<?php } ?>
		</div>
	</div>
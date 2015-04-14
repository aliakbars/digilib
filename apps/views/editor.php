	<div class="container">
		<h1>Editor</h1>
		<form action="<? echo site_url(); ?>/uploader/edit" method="post" enctype="multipart/form-data" class="form-horizontal">
			<fieldset>
				<legend>Description</legend>
				<input id="input-id" name="id" type="hidden" value="<?php echo $desc['id']; ?>">
				<div class="control-group">
					<label class="control-label" for="input-title">Title</label>
					<div class="controls">
						<input id="input-title" name="title" type="text" value="<?php echo $desc['title']; ?>" required>
						<span id="title-help" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-composer">Composer</label>
					<div class="controls">
						<input id="input-composer" name="composer" type="text" value="<?php echo $desc['composer']; ?>" required>
						<span id="composer-help" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-arranger">Arranger</label>
					<div class="controls">
						<input id="input-arranger" name="arranger" type="text" value="<?php echo $desc['arranger']; ?>" required>
						<span id="arranger-help" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-format">Format</label>
					<div class="controls">
						<select id="input-format" name="format">
							<option <?php echo $desc['format'] == "Solo" ? "selected" : null ; ?>>Solo</option>
							<option <?php echo $desc['format'] == "Duet" ? "selected" : null ; ?>>Duet</option>
							<option <?php echo $desc['format'] == "Trio" ? "selected" : null ; ?>>Trio</option>
							<option <?php echo $desc['format'] == "Quartet" ? "selected" : null ; ?>>Quartet</option>
							<option <?php echo $desc['format'] == "String ensemble" ? "selected" : null ; ?>>String ensemble</option>
							<option <?php echo $desc['format'] == "Wind ensemble" ? "selected" : null ; ?>>Wind ensemble</option>
							<option <?php echo $desc['format'] == "Guitar ensemble" ? "selected" : null ; ?>>Guitar ensemble</option>
							<option <?php echo $desc['format'] == "Chamber" ? "selected" : null ; ?>>Chamber</option>
							<option <?php echo $desc['format'] == "Symphonic" ? "selected" : null ; ?>>Symphonic</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-year">Year</label>
					<div class="controls">
						<input id="input-year" name="year" type="text" maxlength="4" value="<?php echo $desc['year']; ?>">
						<span id="year-help" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-tags">Tags</label>
					<div class="controls">
						<input id="input-tags" name="tags" type="text" value="<?php echo $desc['tags']; ?>">
						<p class="help-block">Separate tags by comma (,)</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-file">Revision</label>
					<div class="controls">
						<input id="input-file" name="userfile" type="file">
						<p class="help-block">Only .zip files allowed</p>
					</div>
				</div>
				<?php if (isset($error)) { ?>
				<div class="alert alert-error"><?php echo $error; ?></div>
				<?php } ?>
				<legend>Instruments</legend>
				<div class="control-group">
			<label class="control-label"><strong>Strings</strong></label>
			<div class="controls">
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="violin" name="violin" <?php echo $instruments['violin'] ? 'checked' : null; ?>> Violin
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="viola" name="viola" <?php echo $instruments['viola'] ? 'checked' : null; ?>> Viola
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="violoncello" name="violoncello" <?php echo $instruments['violoncello'] ? 'checked' : null; ?>> Violoncello
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="contrabass" name="contrabass" <?php echo $instruments['contrabass'] ? 'checked' : null; ?>> Contrabass
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><strong>Woodwind</strong></label>
			<div class="controls">
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="flute" name="flute" <?php echo $instruments['flute'] ? 'checked' : null; ?>> Flute
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="clarinet" name="clarinet" <?php echo $instruments['clarinet'] ? 'checked' : null; ?>> Clarinet
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="oboe" name="oboe" <?php echo $instruments['oboe'] ? 'checked' : null; ?>> Oboe
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="bassoon" name="bassoon" <?php echo $instruments['bassoon'] ? 'checked' : null; ?>> Bassoon
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><strong>Brass</strong></label>
			<div class="controls">
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="trumpet" name="trumpet" <?php echo $instruments['trumpet'] ? 'checked' : null; ?>> Trumpet
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="trombone" name="trombone" <?php echo $instruments['trombone'] ? 'checked' : null; ?>> Trombone
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="tuba" name="tuba" <?php echo $instruments['tuba'] ? 'checked' : null; ?>> Tuba
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="horn" name="horn" <?php echo $instruments['horn'] ? 'checked' : null; ?>> Horn
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="otherbrass" name="otherbrass" <?php echo $instruments['otherbrass'] ? 'checked' : null; ?>> Other brass
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><strong>Others</strong></label>
			<div class="controls">
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="otherpercussion" name="otherpercussion" <?php echo $instruments['otherpercussion'] ? 'checked' : null; ?>> Other percussion
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="timpani" name="timpani" <?php echo $instruments['timpani'] ? 'checked' : null; ?>> Timpani
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="piano" name="piano" <?php echo $instruments['piano'] ? 'checked' : null; ?>> Piano
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="guitar" name="guitar" <?php echo $instruments['guitar'] ? 'checked' : null; ?>> Guitar
				</label>
				<label class="checkbox inline">
					<input type="checkbox" value="1" id="choir" name="choir" <?php echo $instruments['choir'] ? 'checked' : null; ?>> Choir
				</label>
			</div>
		</div>
				<div class="form-actions" style="margin-bottom:-20px">
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
			</fieldset>
		</form>
	</div>
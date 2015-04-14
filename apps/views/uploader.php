	<div class="container">
		<h1>Uploader</h1>
		<form action="<?php echo site_url(); ?>/uploader/upload" method="post" enctype="multipart/form-data" class="form-horizontal">
			<fieldset>
				<legend>Description</legend>
				<div class="control-group">
					<label class="control-label" for="input-title">Title</label>
					<div class="controls">
						<input id="input-title" name="title" type="text" required>
						<span id="title-help" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-composer">Composer</label>
					<div class="controls">
						<input id="input-composer" name="composer" type="text" required>
						<span id="composer-help" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-arranger">Arranger</label>
					<div class="controls">
						<input id="input-arranger" name="arranger" type="text" required>
						<span id="arranger-help" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-format">Format</label>
					<div class="controls">
						<select id="input-format" name="format">
							<option>Solo</option>
							<option>Duet</option>
							<option>Trio</option>
							<option>Quartet</option>
							<option>String ensemble</option>
							<option>Wind ensemble</option>
							<option>Guitar ensemble</option>
							<option>Chamber</option>
							<option>Symphonic</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-year">Year</label>
					<div class="controls">
						<input id="input-year" name="year" type="text" maxlength="4">
						<span id="year-help" class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-tags">Tags</label>
					<div class="controls">
						<input id="input-tags" name="tags" type="text">
						<p class="help-block">Separate tags by comma (,)</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-file">File</label>
					<div class="controls">
						<input id="input-file" name="userfile" type="file" required>
						<p class="help-block">Only .zip files allowed</p>
					</div>
				</div>
				<?php if (isset($error)) { ?>
				<div class="alert alert-error"><?php echo $error; ?></div>
				<?php } ?>
				<legend>Instruments</legend>
				<div class="control-group">
					<label class="control-label">Strings</label>
					<div class="controls">
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="violin" name="violin"> Violin
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="viola" name="viola"> Viola
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="violoncello" name="violoncello"> Violoncello
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="contrabass" name="contrabass"> Contrabass
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Woodwind</label>
					<div class="controls">
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="flute" name="flute"> Flute
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="clarinet" name="clarinet"> Clarinet
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="oboe" name="oboe"> Oboe
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="bassoon" name="bassoon"> Bassoon
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Brass</label>
					<div class="controls">
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="trumpet" name="trumpet"> Trumpet
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="trombone" name="trombone"> Trombone
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="tuba" name="tuba"> Tuba
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="horn" name="horn"> Horn
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="otherbrass" name="otherbarss"> Other brass
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Others</label>
					<div class="controls">
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="otherpercussion" name="otherpercussion"> Other percussion
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="timpani" name="timpani"> Timpani
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="piano" name="piano"> Piano
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="guitar" name="guitar"> Guitar
						</label>
						<label class="checkbox inline">
							<input type="checkbox" value="1" id="choir" name="choir"> Choir
						</label>
					</div>
				</div>
				<div class="form-actions" style="margin-bottom:-20px">
					<button type="submit" class="btn btn-primary">Upload</button>
				</div>
			</fieldset>
		</form>
	</div>
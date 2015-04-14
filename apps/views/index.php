	<div id="overlay">
	  <img src="<?php echo base_url(); ?>/public/img/ajax-loader.gif" id="img-load" />
	</div>
	<div class="container">
		<div class="input-prepend input-append">
			<span class="add-on"><i class="icon-search"></i></span>
			<input id="query" type="text" placeholder="Search" value="">
			<select id="meta" class="input-medium">
				<option>Title</option>
				<option>Composer</option>
				<option>Arranger</option>
				<option>Format</option>
				<option>Tags</option>
			</select>
			<button class="btn" id="searchbutton">Go!</button>
		</div>
		<h1>Repertoire</h1>
		<div id="warning">
		</div>
		<table id="trep" class="table table-condensed">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Composer</th>
					<th>Arranger</th>
					<th>Format</th>
					<th>Tags</th>
					<th>Year</th>
					<?php if ($level <= 1) { ?>
					<th>&nbsp;</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody id="table">
				<?php
				foreach ($data as $key => $value) {
					echo "<tr>";
					echo "<td>" . ($key+1) . "</td>";
					echo "<td><a href='" . site_url() . "/repertoire/description/" . $value['id'] . "'>" . $value['title'] . "</a></td>";
					echo "<td>" . $value['composer'] . "</td>";
					echo "<td>" . $value['arranger'] . "</td>";
					echo "<td>" . $value['format'] . "</td>";
					echo "<td>" . $value['tags'] . "</td>";
					echo "<td>" . $value['year'] . "</td>";
					if ($level <= 1)
						echo "<td><a href='javascript:bfce70fd3bbf2adb4800309d3a03a079e79cee9c(\"" . $value['id'] . "\",\"" . $value['title'] . "\")'><i class='icon-trash'></i></a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
<?php

$rm = new Room();
$result = $rm->single_room($_GET['id']);
?>

<div class="modal-dialog" style="width:50%">
	<div class="modal-content">
		<div class="modal-body">
			<form class="form-horizontal well span6" action="controller.php?action=editimage" enctype="multipart/form-data" method="POST">

				<table class="table table-hover" border="0" width="50">
					<caption>
						<h3 align="left">Modify Image</h3>
					</caption>
					<tr>
						<td width="80">
							<input name="id" type="hidden" value="<?php echo $result->room_id; ?>">
							<img src="<?php echo $result->room_image; ?>" width="450" height="250" />
						</td>
					</tr>

					<tr>
						<td width="80">
							<input id="image" name="image" type="file">
						</td>
					</tr>
					<tr>
						<td width="80"><input type="button" value="Close" class="btn btn-default" onclick="window.location.href='index.php'">
							<button class="btn btn-primary" name="save" type="submit">Save</button>

						</td>
					</tr>

				</table>
			</form>
		</div><!--  modal body -->
	</div> <!-- modal content -->
</div> <!-- modal dialog -->
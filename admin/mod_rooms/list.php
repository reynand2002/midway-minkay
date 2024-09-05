<div class="container">
	<?php
	check_message();

	?>
	<div>
	<!-- Add download buttons for PDF and Excel -->
		<button id="downloadPDF">Print</button>
		<button id="downloadExcel">Download Excel</button>
	</div>
	<div class="panel-body">
		<h3 align="left">List of Rooms</h3>
		<?php
		$mydb->setQuery("SELECT COUNT(*) AS totalAvailableRooms FROM `room` WHERE `room_num` = 1");
		$totalAvailableRoomsResult = $mydb->loadResultList();

		if (!empty($totalAvailableRoomsResult)) {
			$totalAvailableRooms = $totalAvailableRoomsResult[0]->totalAvailableRooms;

			echo "<h4 style='color: darkcyan;'>Total Available Rooms: " . $totalAvailableRooms . "</h4>";
		} else {
			echo "<h4 style='color: darkcyan;'>No available rooms found in the database.</h4>";
		}
		?>
		<form action="controller.php?action=delete" Method="POST">
			<table id="example" style="font-size:12px" class="table table-striped table-hover table-responsive" cellspacing="0">

				<thead>
					<tr>
						<th>No.</th>
						<th align="left" width="100">
							<input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">
							Image
						</th>
						<th align="left" width="200">Room</th>
						<th align="left" width="120">Accomodation</th>
						<th align="left" width="90">Person/s</th>
						<th align="left" width="200">Price</th>
						<th># of Rooms</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$mydb->setQuery("SELECT *,accomodation_name FROM room r, accomodation a WHERE r.accomodation_id = a.accomodation_id ORDER BY  room_id ASC ");

					$cur = $mydb->loadResultList();

					foreach ($cur as $result) {
						if (!is_file($result->room_image))
							$result->room_image = WEB_ROOT . 'no-img.png';
						echo '<tr>';
						echo '<td width="5%" align="center"></td>';
						echo '<td align="left" width="120">
						<input type="checkbox" name="selector[]" id="selector[]" value="' . $result->room_id . '"/> 
						<a href="index.php?view=editpic&id=' . $result->room_id . '" class="roomImg" data-id="' . $result->room_id . '" title="Click here to Change Image.">
						<img src="' . $result->room_image . '" width="60" height="40"/></a></td>
					';
						echo '<td><a href="index.php?view=edit&id=' . $result->room_id . '">' . $result->room . ' | (' . $result->room_description . ')</a></td>';
						echo '<td>' . $result->accomodation_name . '</td>';
						echo '<td>' . $result->num_person . '</td>';

						echo '<td> &#8369 ' . $result->price . '</td>';
						echo '<td>' . $result->room_num . ' </td>';
						echo '</tr>';
					}
					?>
				</tbody>

			</table>
			<div class="btn-group">
				<a href="index.php?view=add" class="btn btn-default">New</a>
				<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
			</div>
		</form>
	</div><!--End of Panel Body-->

	<!--End of Main Panel-->

</div><!--End of container-->

<div class="modal fade" id="myModal" tabindex="-1">

</div>

<script>
    document.getElementById('downloadPDF').addEventListener('click', function () {
        printTable();
    });

    function printTable() {
        var table = document.getElementById('example').outerHTML;
        
        document.body.innerHTML = '<html><head><title>Midway Minkay - List of Rooms</title></head><body>' + table + '</body></html>';
        window.print();

        // Restore the original content after printing
        document.location.reload(true);
    }

    document.getElementById('downloadExcel').addEventListener('click', function () {

        var data = [];
        var table = document.getElementById('example');
        var rows = table.getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {
            var rowData = [];
            var cells = rows[i].getElementsByTagName('td');
            for (var j = 0; j < cells.length; j++) {
                rowData.push(cells[j].innerText);
            }
            data.push(rowData);
        }

        var ws = XLSX.utils.aoa_to_sheet(data);

        var wb = XLSX.utils.book_new();

        var currentDate = new Date();
        var dateString = currentDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD

        var sheetName = 'Room Table - ' + dateString;

        XLSX.utils.book_append_sheet(wb, ws, sheetName);

        XLSX.writeFile(wb, 'Midway Minkay - Room List - ' + dateString + '.xlsx');
    });
</script>
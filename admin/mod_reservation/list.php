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
		<form method="post" action="processreservation.php?action=delete">
		<table id="table" class="table table-striped" cellspacing="0">
		<thead>
			<tr>
				<th width="5%">#</th>
				<th width="90"><strong>Guest</strong></th>
				<th width="80"><strong>Transaction Date</strong></th>
				<th width="40"><strong>Arrival Date</strong></th>
				<th width="40"><strong>Departure Date</strong></th>
				<th width="80"><strong>Reference Number</strong></th>
				<th width="70"><strong>Total Rooms</strong></th>
				<th width="70"><strong>Total Price</strong></th>
				<th width="80"><strong>Status</strong></th>
				<th width="100"><strong>Action</strong></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$mydb->setQuery("SELECT 
								g.`firstname`, 
								g.`lastname`, 
								g.`address`, 
								p.`trans_date`, 
								r.`arrival`, 
								r.`departure`, 
								p.`confirmation_code`, 
								p.`p_qty`, 
								p.`price`, 
								p.`status`
							FROM  
								`guest` g
							INNER JOIN 
								`payment` p ON g.`guest_id` = p.`guest_id`
							INNER JOIN 
								`reservation` r ON p.`confirmation_code` = r.`confirmation_code`
							ORDER BY 
								p.`status`='Pending' DESC");
			$cur = $mydb->loadResultList();

			$count = 1; // Initialize the counter

			foreach ($cur as $result) {
				?>
				<tr>
					<td width="5%" align="center"><?php echo $count++; ?></td>
					<td align="center"><?php echo $result->firstname . " " . $result->lastname; ?></td>
					<td align="center"><?php echo date('F j, Y, g:i a', strtotime($result->trans_date)); ?></td>
					<td align="center"><?php echo ($result->arrival) ? date('F j, Y', strtotime($result->arrival)) : ''; ?></td>
					<td align="center"><?php echo ($result->departure) ? date('F j, Y', strtotime($result->departure)) : ''; ?></td>
					<td align="center"><?php echo $result->confirmation_code; ?></td>
					<td align="center"><?php echo $result->p_qty; ?></td>
					<td>  <?php echo number_format($result->price, 2); ?></td>
					<td align="center"><?php echo $result->status; ?></td>
					<td>
						<?php if ($result->status == 'Confirmed') { ?>
							<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>View</a>
							<a href="controller.php?action=checkin&code=<?php echo $result->confirmation_code; ?>" class="btn btn-success btn-xs"><i class="icon-edit"></i>Check in</a>
						<?php } elseif ($result->status == 'Checkedin') { ?>
							<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>View</a>
							<a href="controller.php?action=checkout&code=<?php echo $result->confirmation_code; ?>" class="btn btn-danger btn-xs"><i class="icon-edit"></i>Check out</a>
						<?php } elseif ($result->status == 'Checkedout') { ?>
							<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>View</a>
						<?php } elseif ($result->status == 'Cancelled') { ?>
							<p class="badge">Cancelled</p>
						<?php } else { ?>
							<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>View</a>
							<a href="controller.php?action=cancel&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>Cancel</a>
							<a href="controller.php?action=confirm&code=<?php echo $result->confirmation_code; ?>" class="btn btn-success btn-xs"><i class="icon-edit"></i>Confirm</a>
						<?php } ?>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	</form>
	<!-- </div> -->
	</div>

<!-- Your existing script for PDF and Excel download -->
<script>
	document.getElementById('downloadPDF').addEventListener('click', function () {
    printTable();
	});

	function printTable() {
		var table = document.getElementById('table').cloneNode(true);

		var rows = table.getElementsByTagName('tr');
		for (var i = 0; i < rows.length; i++) {
			var cells = rows[i].getElementsByTagName('th');
			if (cells.length > 0) {
				cells[cells.length - 1].remove();
			}

			cells = rows[i].getElementsByTagName('td');
			if (cells.length > 0) {
				cells[cells.length - 1].remove();
			}
		}

		var newDiv = document.createElement('div');
		newDiv.style.fontFamily = 'Arial, sans-serif';
		newDiv.style.fontSize = '12px';
		newDiv.style.margin = '20px';
		newDiv.appendChild(table);

		var printWindow = window.open('', '_blank');
		var currentDate = new Date();
		var dateStringPrint = currentDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD
		printWindow.document.write('<html><head><title>Midway Minkay - Reservations - ' + dateStringPrint + '</title>');
		printWindow.document.write('<style>');
		printWindow.document.write('table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }');
		printWindow.document.write('th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }');
		printWindow.document.write('th { background-color: #f2f2f2; }');
		printWindow.document.write('</style>');
		printWindow.document.write('</head><body>');
		printWindow.document.write(newDiv.innerHTML);
		printWindow.document.write('</body></html>');
		printWindow.document.close();

		// Print immediately without a delay
		printWindow.print();
		printWindow.close();
	}


	document.getElementById('downloadExcel').addEventListener('click', function () {
		var data = [];
		var table = document.getElementById('table');
		var rows = table.getElementsByTagName('tr');

		// Include the table header in the Excel data
		var headerRow = table.rows[0];
		var headerData = [];
		for (var k = 0; k < headerRow.cells.length - 1; k++) {
			headerData.push(headerRow.cells[k].innerText);
		}
		data.push(headerData);

		for (var i = 1; i < rows.length; i++) {
			var rowData = [];
			var cells = rows[i].getElementsByTagName('td');

			for (var j = 0; j < cells.length - 1; j++) {
				rowData.push(cells[j].innerText);
			}

			data.push(rowData);
		}

		var ws = XLSX.utils.aoa_to_sheet(data);

		var wb = XLSX.utils.book_new();

		var currentDate = new Date();
		var dateString = currentDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD

		var sheetName = 'Reservation Table - ' + dateString;

		XLSX.utils.book_append_sheet(wb, ws, sheetName);

		XLSX.writeFile(wb, 'Midway Minkay - Reservations - ' + dateString + '.xlsx');
	});

</script>
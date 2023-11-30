<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add':
		doInsert();
		break;

	case 'edit':
		doEdit();
		break;

	case 'delete':
		doDelete();
		break;
}
function doInsert()
{
	// Check if required fields are empty
	if (empty($_POST['accommodation_name']) || empty($_POST['accommodation_description'])) {
		message("All fields required!", "error");
		redirect("index.php?view=add");
	} else {
		// Form data is valid, proceed with insertion
		$accomodation = new Accomodation();
		$accomodation->accomodation_name = $_POST['accommodation_name'];
		$accomodation->accomodation_description = $_POST['accommodation_description'];

		// Attempt to create a new entry
		$inserted = $accomodation->create();

		if ($inserted) {
			$name = $_POST['accommodation_name'];
			message("New [" . $name . "] created successfully!", "success");
			redirect('index.php');
		} else {
			message("Failed to create entry.", "error");
			redirect('index.php?view=add');
		}
	}
}

function doEdit()
{
	if ($_POST['accomodation_name'] == "" or $_POST['accomodation_description'] == "") {
		message("All fields required!", "error");
		redirect("index.php?view=edit");
	} else {

		$accomodation = new Accomodation();


		$accomodation->accomodation_name = $_POST['accomodation_name'];
		$accomodation->accomodation_description =  $_POST['accomodation_description'];


		$accomodation->update($_POST['accomodation_id']);

		message("New [" . $_POST['accomodation_name'] . "] Updated successfully!", "success");
		redirect('index.php');
	}
}

function doDelete()
{
	@$id = $_POST['selector'];
	$key = count($id);
	//multi delete using checkbox as a selector

	for ($i = 0; $i < $key; $i++) {

		$accomodation = new Accomodation();
		$accomodation->delete($id[$i]);
	}

	message("Accomodation already Deleted!", "info");
	redirect('index.php');
}

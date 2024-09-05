<?php
require_once("../includes/initialize.php");
 if (!isset($_SESSION['admin_id'])){
 	redirect('login.php');
 	return true;
 }

$content='home.php';

include 'themes/backendTemplate.php';

?>

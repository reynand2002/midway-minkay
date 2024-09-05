<?php 
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
		
	if ($_POST['name'] == "" OR $_POST['username'] == "" OR $_POST['password'] == "") {
		$messageStats = false;
			message("All fields required!", "error");
			redirect("index.php?view=add");
		
	}else{

		$user = new User();
		$acc_name		= $_POST['name']; 
		$res = $user->find_all_user($acc_name);
		
		
		if ($res >=1) {
			message("Account name already exist!", "error");
			redirect("index.php?view=add");
		}else{
			
			
			$user = new User(); 
			$user->name 		= $_POST['name'];
			$user->username 	= $_POST['username'];
			$user->password 		= sha1($_POST['password']);
			$user->role 		=  $_POST['role'];
			$user->phone 		= $_POST['phone'];
			$istrue = $user->create(); 

			 if ($istrue == 1){
			 	message("New [".$_POST['name']."] created successfully!", "success");
			 	redirect('index.php');
			 	
			 }
		}	 

		
	}	
}
function doEdit(){
	if ($_POST['name'] == "" OR $_POST['username'] == "" OR $_POST['password'] == "") {
		$messageStats = false;
			message("All fields required!", "error");
			redirect("index.php?view=edit&id=".$_SESSION['id']);
		
	}else{
			$user = new User(); 
			$user->name 		= $_POST['name'];
			$user->username 	= $_POST['username'];
			$user->password 		= sha1($_POST['password']);
			$user->role 		=  $_POST['role'];
			$user->phone 		= $_POST['phone'];
			
			$user->update($_POST['useraccount_id']); 
				
			 	message("[".  $_POST['name'] ."] Upadated successfully!", "success");
			 	redirect('index.php');
			

		
	}	
		
}

function doDelete(){
	 @$id=$_POST['selector'];
		  $key = count($id);
		//multi delete using checkbox as a selector
		
	for($i=0;$i<$key;$i++){
	 
		$user = new User();
		$user->delete($id[$i]);
	}

		message("User already Deleted!","info");
		redirect('index.php');

}

?>
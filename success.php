<?php
	$title = "Success Page";
	require_once 'includes/header.php';
	require_once 'db/conn.php';

	if (isset($_POST['submit'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$dob = $_POST['dob'];
		$specialty = $_POST['specialty'];
		$email= $_POST['email'];
		$phone = $_POST['phone'];

		$success = $crud->insertAttendees($firstname,$lastname,$dob,$specialty,$email,$phone);
		
		if ($success){
			require_once 'includes/success_msg.php'
		}else{
			require_once 'includes/error_msg.php'
		}
	}
	if (isset($_POST['save'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$dob = $_POST['dob'];
		$specialty = $_POST['specialty'];
		$email= $_POST['email'];
		$phone = $_POST['phone'];

		$success = $crud->editAttendee($id, $firstname,$lastname,$dob,$specialty,$email,$phone);
		
		if ($success){
			require_once 'includes/success_msg.php'
		}else{
			require_once 'includes/error_msg.php'
		}
	}
?>

<?php require_once 'includes/footer.php' ?>
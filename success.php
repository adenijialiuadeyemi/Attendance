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
			echo "<h1 class='text-center text-success'>Record inserted successfully...</h1>";
		}else{
			echo "<h1 class='text-center text-danger'>Record NOT inserted successfully...</h1>";
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
			echo "<h1 class='text-center text-success'>Record Updated successfully...</h1>";
		}else{
			echo "<h1 class='text-center text-danger'>Record NOT Updated successfully...</h1>";
		}
	}
?>

<?php require_once 'includes/footer.php' ?>
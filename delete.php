<?php
 	$title = "Delete Page";
	require_once 'includes/header.php';
	require_once 'db/conn.php';

	if (!isset($_GET['id'])){
		require_once 'includes/error_msg.php';
		header('location:viewRecords.php');
	}else{
		$id = $_GET['id'];
		$result = $crud->deleteAttendee($id);

		if ($result){
			header("location:viewRecords.php");
		};
		}
?>
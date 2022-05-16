<?php
 	$title = "View Page";
	require_once 'includes/header.php';
	require_once 'db/conn.php';
?>

<?php 
	if (!isset($_GET['id'])){
		require_once 'includes/error_msg.php';
		header('location:viewRecords.php');
	}else{
		$id = $_GET['id'];
		$result = $crud->viewAttendeeDetails($id);

		if($result) ?>
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="card-title">
			    	<?php echo $result['firstname'].' '. $result['lastname']; ?>	
			    </h5>
			    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['names']; ?></h6>
			    <p class="card-text"><?php echo $result['dob']; ?></p>
			    <p class="card-text"><?php echo $result['email']; ?></p>
			    <p class="card-text"><?php echo $result['phone']; ?></p>
			  </div>
			</div>

			<a href="viewRecords.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-primary">Back to List</a>
      		<a href="edit.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-warning">Edit</a>
      		<a class="btn btn-danger" onclick="confirm('Are you sure you want to delete?')" href="delete.php?id=<?php echo $result['attendee_id']; ?>">Delete</a>

		<?php };
?>





<?php require_once 'includes/footer.php' ?>
<?php
 	$title = "Home Page";
	require_once 'includes/header.php';
	require_once 'db/conn.php';
?>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col" style="text-align:center;">Area of Specialization</th>
      <th scope="col" style="text-align:center;">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    	<?php 
    		$result = $crud->viewAttendees();
    		if($result){
    			foreach($result as $r){ ?>
      				<td><?php echo $r['firstname'] ?></td>
      				<td><?php echo $r['lastname'] ?></td>
      				<td style="text-align:center;"><?php echo $r['names'] ?></td>
      				<td style="text-align:center;">
      					<a href="viewDetails.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
      					<a href="edit.php?id=<?php echo $r['attendee_id']; ?>" class="btn btn-warning">Edit</a>
      					<a onclick="confirm('Are you sure you want to delete?')" href="delete.php?id=<?php echo $r['attendee_id']; ?>" class="btn btn-danger">Delete</a>
      				</td></center>
    			</tr>
<?php    }
}; ?>
      
  </tbody>
</table>

<?php require_once 'includes/footer.php' ?>
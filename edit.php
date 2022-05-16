<?php
 	$title = "Home Page";
	require_once 'includes/header.php';
	require_once 'db/conn.php';

	if (!isset($_GET['id'])){
		require_once 'includes/error_msg.php';
		header('location:viewRecords.php');
	}else{
		$id = $_GET['id'];
		$attendees = $crud->viewAttendeeDetails($id);
		}

?>

	<h1 class="text-center text-primary">Registration for IT Conference</h1>
	<form method="POST" action="success.php">
		<input type="hidden" name="id" value="<?php echo $attendees['attendee_id']; ?>">
	  <div class="mb-3">
	    <label for="firstname" class="form-label">First Name</label>
	    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $attendees['firstname']; ?>">
	  </div>
	  <div class="mb-3">
	    <label for="lastname" class="form-label">Last Name</label>
	    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $attendees['lastname']; ?>">
	  </div>
	  <div class="mb-3">
	    <label for="dob" class="form-label">Date of Birth</label>
	    <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $attendees['dob']; ?>">
	  </div>
	  <div class="mb-3">
	    <label for="specialty" class="form-label">Area of Specialization</label>
	    	<select class="form-select" id="specialty" name="specialty">
	    		<?php
	    			$result = $crud->getSpecialties();
	    			if($result){
	    				foreach($result as $r){;?>
	    					<option value="<?php echo $r['Specialty_id']; ?>"<?php if ($attendees['Specialty_id'] == $r['Specialty_id']) echo 'selected' ?>><?php echo $r['names'] ?></option>
	    				<?php }
	    			}
	    		?>
			</select>
	  </div>
	  <div class="mb-3">
	    <label for="email" class="form-label">Email</label>
	    <input type="email" class="form-control" id="email" name="email" value="<?php echo $attendees['email']; ?>">
	    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
	  </div>
	  <div class="mb-3">
	    <label for="phone" class="form-label">Contact Number</label>
	    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $attendees['phone']; ?>">
	    <div id="phoneHelp" class="form-text">We'll never share your contact number with anyone else.</div>
	  </div>
	  <button type="submit" class="btn btn-primary form-control" name="save">Save Changes</button>
	</form>



<?php require_once 'includes/footer.php' ?>
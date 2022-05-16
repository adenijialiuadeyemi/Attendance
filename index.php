<?php
 	$title = "Home Page";
	require_once 'includes/header.php';
	require_once 'db/conn.php';
?>

	<h1 class="text-center text-primary">Registration for IT Conference</h1>
	<form method="POST" action="success.php">
	  <div class="mb-3">
	    <label for="firstname" class="form-label">First Name</label>
	    <input required type="text" class="form-control" id="firstname" name="firstname">
	  </div>
	  <div class="mb-3">
	    <label for="lastname" class="form-label">Last Name</label>
	    <input required type="text" class="form-control" id="lastname" name="lastname">
	  </div>
	  <div class="mb-3">
	    <label for="dob" class="form-label">Date of Birth</label>
	    <input type="text" class="form-control" id="dob" name="dob">
	  </div>
	  <div class="mb-3">
	    <label for="specialty" class="form-label">Area of Specialization</label>
	    	<select class="form-select" id="specialty" name="specialty">
	    		<?php
	    			$result = $crud->getSpecialties();
	    			if($result){
	    				foreach($result as $r){;?>
	    					<option value="<?php echo $r['Specialty_id'] ?>"><?php echo $r['names'] ?></option>
	    				<?php }
	    			}
	    		?>
			</select>
	  </div>
	  <div class="mb-3">
	    <label for="email" class="form-label">Email</label>
	    <input type="email" class="form-control" id="email" name="email">
	    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
	  </div>
	  <div class="mb-3">
	    <label for="phone" class="form-label">Contact Number</label>
	    <input type="text" class="form-control" id="phone" name="phone">
	    <div id="phoneHelp" class="form-text">We'll never share your contact number with anyone else.</div>
	  </div>
	  <button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>
	</form>



<?php require_once 'includes/footer.php' ?>
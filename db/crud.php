<?php 
	
	class crud{
		private $db;

		function __construct($conn){
			$this->db = $conn;
		}

		public function insertAttendees($firstname, $lastname, $dob, $specialty, $email, $phone){
			try{
				$sql = "INSERT INTO attendees (firstname, lastname, dob, Specialty_id, email, phone) VALUES (:firstname,:lastname,:dob,:specialty,:email,:phone)";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(':firstname',$firstname);
				$stmt->bindparam(':lastname',$lastname);
				$stmt->bindparam(':dob',$dob);
				$stmt->bindparam(':specialty',$specialty);
				$stmt->bindparam(':email',$email);
				$stmt->bindparam(':phone',$phone);
				$stmt->execute();
				return true;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function viewAttendees(){
			try{
				$sql = "SELECT * FROM attendees a inner join specialties4 s on a.Specialty_id = s.Specialty_id";
				$stmt = $this->db->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetchall(PDO::FETCH_ASSOC);
				return $result;
			}catch (PDOExpetion $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function getSpecialties(){
			try{
				$sql = "SELECT * FROM specialties4";
				$stmt = $this->db->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetchall(PDO::FETCH_ASSOC);
				return $result;
			}catch (PDOExpetion $e){
				echo $e->getMessage();
				return false;
			}
		}
	
		public function viewAttendeeDetails($id){
			try{
				$sql = "SELECT * FROM attendees a inner join specialties4 s on a.Specialty_id = s.Specialty_id WHERE attendee_id = :id";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(':id',$id);
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				return $result;
			}catch (PDOExpetion $e){
				echo $e->getMessage();
				return false;
			}
		}
	
		public function editAttendee($id, $firstname, $lastname, $dob, $specialty, $email, $phone){
			try{
				$sql="UPDATE attendees SET firstname=:firstname, lastname=:lastname, dob=:dob, Specialty_id=:specialty, email=:email, phone=:phone WHERE attendee_id=:id";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(':id',$id);
				$stmt->bindparam(':firstname',$firstname);
				$stmt->bindparam(':lastname',$lastname);
				$stmt->bindparam(':dob',$dob);
				$stmt->bindparam(':specialty',$specialty);
				$stmt->bindparam(':email',$email);
				$stmt->bindparam(':phone',$phone);
				$stmt->execute();
				return true;
			}catch (PDOExpetion $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function deleteAttendee($id){
			try{
				$sql = "DELETE FROM attendees WHERE attendee_id=:id";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(':id',$id);
				$stmt->execute();
				return true;
			}catch (PDOExpetion $e){
				echo $e->getMessage();
				return false;
			}
		}

	}
?>
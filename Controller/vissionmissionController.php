<?php
class vissionmissionController{
	protected $conn;

	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	// public function __construct(){
	// 	$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "root", "", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	} 

	public function getData(){
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM vission_mission WHERE delete_date IS NULL ORDER BY created_date DESC");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->execute();
		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	}    

	public function getDataByUid($uID) {
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM vission_mission WHERE ID_VM = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("i", $uID);
		$stmt->execute();
		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	}  
	
	public function addReport($Vission, $Visi, $Mission, $Misi, $Motto, $Moto, $Phylosophy, $Filosofi, $date){
		// Sanitize input to prevent SQL injection
		$vission = mysqli_real_escape_string($this->conn, $Vission);
		$visi = mysqli_real_escape_string($this->conn, $Visi);
		$mission = mysqli_real_escape_string($this->conn, $Mission);
		$misi = mysqli_real_escape_string($this->conn, $Misi);
		$motto = mysqli_real_escape_string($this->conn, $Motto);
		$moto = mysqli_real_escape_string($this->conn, $Moto);
		$phylosophy = mysqli_real_escape_string($this->conn, $Phylosophy);
		$filosofi = mysqli_real_escape_string($this->conn, $Filosofi);

		// Use prepared statements for better security
		$query = "INSERT INTO vission_mission (vission, visi, mission, misi, motto, moto, phylosophy, filosofi, created_date)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = $this->conn->prepare($query);
		
		if ($stmt === false) {
			die("Prepare failed: " . $this->conn->error);
		}

		$stmt->bind_param("sssssssss", $vission, $visi, $mission, $misi, $motto, $moto, $phylosophy, $filosofi, $date);
		$result = $stmt->execute();

		return $result;
	}


	public function updateDataByUID($Vission, $Visi, $Mission, $Misi, $Motto, $Moto, $Phylosophy, $Filosofi, $date, $id){
		$vission = mysqli_real_escape_string($this->conn, $Vission);
		$visi = mysqli_real_escape_string($this->conn, $Visi);
		$mission = mysqli_real_escape_string($this->conn, $Mission);
		$misi = mysqli_real_escape_string($this->conn, $Misi);
		$motto = mysqli_real_escape_string($this->conn, $Motto);
		$moto = mysqli_real_escape_string($this->conn, $Moto);
		$phylosophy = mysqli_real_escape_string($this->conn, $Phylosophy);
		$filosofi = mysqli_real_escape_string($this->conn, $Filosofi);

		$query = "UPDATE vission_mission 
				SET vission = ?, visi = ?, mission = ?, misi = ?, motto = ?, moto = ?, phylosophy = ?, filosofi = ?, update_date = ?
				WHERE ID_VM = ?";

		$stmt = $this->conn->prepare($query);
		if (!$stmt) {
			die("Prepare failed: " . $this->conn->error);
		}

		$stmt->bind_param("sssssssssi", $vission, $visi, $mission, $misi, $motto, $moto, $phylosophy, $filosofi, $date, $id);

		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	public function deleteReport($deletedate, $IDReport){
		// Check if the record exists
		$checkQuery = "SELECT 1 FROM vission_mission WHERE ID_VM = ?";
		$checkStmt = $this->conn->prepare($checkQuery);
		if (!$checkStmt) {
			die("Prepare failed: " . $this->conn->error);
		}
		$checkStmt->bind_param("i", $IDReport);
		$checkStmt->execute();
		$checkStmt->store_result();

		if ($checkStmt->num_rows == 1) {
			$checkStmt->close();

			// Perform soft delete
			$updateQuery = "UPDATE vission_mission SET delete_date = ? WHERE ID_VM = ?";
			$updateStmt = $this->conn->prepare($updateQuery);
			if (!$updateStmt) {
				die("Prepare failed: " . $this->conn->error);
			}
			$updateStmt->bind_param("si", $deletedate, $IDReport);
			$result = $updateStmt->execute();
			$updateStmt->close();
			return $result;
		} else {
			$checkStmt->close();
			return false;
		}
	} 
}
?>


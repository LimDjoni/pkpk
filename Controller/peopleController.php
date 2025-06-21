<?php
class peopleController{
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

		$stmt = $this->conn->prepare("SELECT * FROM people WHERE delete_date IS NULL ORDER BY created_date DESC");
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

	public function getDataByUid($uID){
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM people WHERE ID_People = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("i", $uID); // Use "s" if ID_People is a string
		$stmt->execute();
		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	}   

	public function getDataByStatus($Stat){
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM people WHERE Status = ? AND delete_date IS NULL");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;  // Return empty array if prepare fails
		}

		$stmt->bind_param("s", $Stat);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows == 0) {
			return "-";
		}

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	}


	public function addReport($Name, $Jabatan, $Position, $Deskripsi, $Des, $img, $Status, $createddate){
		$stmt = $this->conn->prepare("INSERT INTO people (Name, Jabatan, Position, Deskripsi, Des, Img, Status, created_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}
		$stmt->bind_param("ssssssss", $Name, $Jabatan, $Position, $Deskripsi, $Des, $img, $Status, $createddate);
		$result = $stmt->execute();
		if (!$result) {
			error_log("Execute failed: " . $stmt->error);
		}
		$stmt->close();
		return $result;
	}


	public function updateDataByUID($Name, $Jabatan, $Position, $Deskripsi, $Des, $img, $Status, $updatedate, $uID){
		$stmt = $this->conn->prepare("UPDATE people SET Name = ?, Jabatan = ?, Position = ?, Deskripsi = ?, Des = ?, Img = ?, Status = ?, update_date = ? WHERE ID_People = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}
		$stmt->bind_param("ssssssssi", $Name, $Jabatan, $Position, $Deskripsi, $Des, $img, $Status, $updatedate, $uID);
		$result = $stmt->execute();
		if (!$result) {
			error_log("Execute failed: " . $stmt->error);
		}
		$stmt->close();
		return $result;
	} 

	public function updateDataWithoutFileByUID($Name, $Jabatan, $Position, $Deskripsi, $Des, $Status, $updatedate, $uID){
		$stmt = $this->conn->prepare("UPDATE people SET Name = ?, Jabatan = ?, Position = ?, Deskripsi = ?, Des = ?, Status = ?, update_date = ? WHERE ID_People = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}
		$stmt->bind_param("sssssssi", $Name, $Jabatan, $Position, $Deskripsi, $Des, $Status, $updatedate, $uID);
		$result = $stmt->execute();
		if (!$result) {
			error_log("Execute failed: " . $stmt->error);
		}
		$stmt->close();
		return $result;
	} 

	public function deleteReport($deletedate, $IDReport){
		// Prepare SELECT to check if record exists
		$stmt = $this->conn->prepare("SELECT 1 FROM people WHERE ID_People = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}
		$stmt->bind_param("i", $IDReport);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows === 1) {
			$stmt->close();
			// Prepare UPDATE to set delete_date
			$stmt2 = $this->conn->prepare("UPDATE people SET delete_date = ? WHERE ID_People = ?");
			if (!$stmt2) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}
			$stmt2->bind_param("si", $deletedate, $IDReport);
			$result = $stmt2->execute();
			if (!$result) {
				error_log("Execute failed: " . $stmt2->error);
			}
			$stmt2->close();
			return $result;
		} else {
			$stmt->close();
			return false;
		}
	}
}
?>


<?php
class managementController{
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

		$stmt = $this->conn->prepare("SELECT * FROM management WHERE delete_date IS NULL ORDER BY created_date DESC");
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

		$stmt = $this->conn->prepare("SELECT * FROM management WHERE ID_M = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("i", $uID); // Use "s" if ID_M is a string
		$stmt->execute();
		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	}   

	public function updateDataByUID($Overview, $bocEng, $bocIndo, $bodEng, $bodIndo, $acEng, $acIndo, $csEng, $csIndo, $updatedate, $uID) {
		$query = "UPDATE management 
				SET Overview = ?, bocEng = ?, bocIndo = ?, bodEng = ?, bodIndo = ?, acEng = ?, acIndo = ?, csEng = ?, csIndo = ?, update_date = ? 
				WHERE ID_M = ?";

		$stmt = $this->conn->prepare($query);
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param(
			"ssssssssssi",
			$Overview,
			$bocEng,
			$bocIndo,
			$bodEng,
			$bodIndo,
			$acEng,
			$acIndo,
			$csEng,
			$csIndo,
			$updatedate,
			$uID
		);

		$result = $stmt->execute();
		$stmt->close();

		return $result;
	} 

	public function updateDataWithoutFileByUID($bocEng, $bocIndo, $bodEng, $bodIndo, $acEng, $acIndo, $csEng, $csIndo, $updatedate, $uID) {
		$query = "UPDATE management SET bocEng = ?, bocIndo = ?, bodEng = ?, bodIndo = ?, acEng = ?, acIndo = ?, csEng = ?, csIndo = ?, update_date = ? WHERE ID_M = ?";

		$stmt = $this->conn->prepare($query);
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param(
			"sssssssssi",
			$bocEng,
			$bocIndo,
			$bodEng,
			$bodIndo,
			$acEng,
			$acIndo,
			$csEng,
			$csIndo,
			$updatedate,
			$uID
		);

		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}  
}
?>


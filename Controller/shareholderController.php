<?php
class shareholderController{
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

		$stmt = $this->conn->prepare("SELECT * FROM shareholder WHERE delete_date IS NULL ORDER BY created_date DESC");
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

		$stmt = $this->conn->prepare("SELECT * FROM shareholder WHERE ID_SH = ?");
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
	
	public function addReport($shareholder_name, $nama_pemegangsaham, $NOS, $percent, $date) {
		$stmt = $this->conn->prepare("INSERT INTO shareholder (shareholder_name, nama_pemegangsaham, NOS, percent, created_date) VALUES (?, ?, ?, ?, ?)");
		
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssiis", $shareholder_name, $nama_pemegangsaham, $NOS, $percent, $date);

		$result = $stmt->execute();
		$stmt->close();

		return $result;
	} 

	public function updateDataByUID($shareholder_name, $nama_pemegangsaham, $NOS, $percent, $date, $id) {
		$stmt = $this->conn->prepare("UPDATE shareholder 
			SET shareholder_name = ?, 
				nama_pemegangsaham = ?, 
				NOS = ?, 
				percent = ?, 
				update_date = ? 
			WHERE ID_SH = ?");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssiisi", $shareholder_name, $nama_pemegangsaham, $NOS, $percent, $date, $id);

		$result = $stmt->execute();
		$stmt->close();

		return $result;
	} 

	public function deleteReport($deletedate, $IDReport) {
		// First, check if the record exists
		$stmtCheck = $this->conn->prepare("SELECT ID_SH FROM shareholder WHERE ID_SH = ?");
		if (!$stmtCheck) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmtCheck->bind_param("i", $IDReport);
		$stmtCheck->execute();
		$stmtCheck->store_result();

		if ($stmtCheck->num_rows === 1) {
			$stmtCheck->close();

			// Perform soft delete
			$stmtDelete = $this->conn->prepare("UPDATE shareholder SET delete_date = ? WHERE ID_SH = ?");
			if (!$stmtDelete) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}

			$stmtDelete->bind_param("si", $deletedate, $IDReport);
			$result = $stmtDelete->execute();
			$stmtDelete->close();

			return $result;
		} else {
			$stmtCheck->close();
			return false;
		}
	} 
}
?>


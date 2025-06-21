<?php
include_once 'config.php';

class growthjourneyController{
	protected $conn;
 
	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	// public function __construct(){
	// 	$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

		if (!$this->conn) {
			die("Database connection failed: " . mysqli_connect_error());
		}

		// Set charset to UTF-8 for safety
		mysqli_set_charset($this->conn, "utf8mb4");
	}

	public function getData() {
		$query = mysqli_query($this->conn, "SELECT * FROM growth_journey WHERE delete_date IS NULL ORDER BY created_date");

		if (!$query) {
			error_log("Database query failed: " . mysqli_error($this->conn));
			return [];
		}

		$data = [];
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data[] = $row;
		}

		return $data;
	}

	public function getDataByUid($uID) {
		$stmt = $this->conn->prepare("SELECT * FROM growth_journey WHERE ID_GJ = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return null;
		}

		$stmt->bind_param("i", $uID); 
		$stmt->execute();
		$result = $stmt->get_result();

		$data = $result->fetch_assoc(); // Fetch one row
		$stmt->close();

		return $data ?: null; // Return null if no row found
	}

	public function addReport($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate) {
		$stmt = $this->conn->prepare("
			INSERT INTO growth_journey (Judul, title, Tahun, Des, Deskripsi, PDF, created_date)
			VALUES (?, ?, ?, ?, ?, ?, ?)
		");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssissss", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate);

		$success = $stmt->execute();
		if (!$success) {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();
		return $success;
	}

	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID) {
		$stmt = $this->conn->prepare("
			UPDATE growth_journey 
			SET Judul = ?, title = ?, Tahun = ?, Des = ?, Deskripsi = ?, PDF = ?, update_date = ?
			WHERE ID_GJ = ?
		");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssissssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID);
		
		$success = $stmt->execute();
		if (!$success) {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();
		return $success;
	} 

	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID) {
		$stmt = $this->conn->prepare("
			UPDATE growth_journey 
			SET Judul = ?, title = ?, Tahun = ?, Des = ?, Deskripsi = ?, update_date = ?
			WHERE ID_GJ = ?
		");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssisssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID);
		
		$success = $stmt->execute();
		if (!$success) {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();
		return $success;
	} 

	public function deleteReport($deletedate, $IDReport) {
		// Check if the report exists
		$stmt = $this->conn->prepare("SELECT ID_GJ FROM growth_journey WHERE ID_GJ = ?");
		if (!$stmt) {
			error_log("Prepare failed (check): " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("i", $IDReport);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows === 1) {
			$stmt->close();

			// Proceed to soft-delete (set delete_date)
			$stmtUpdate = $this->conn->prepare("UPDATE growth_journey SET delete_date = ? WHERE ID_GJ = ?");
			if (!$stmtUpdate) {
				error_log("Prepare failed (update): " . $this->conn->error);
				return false;
			}

			$stmtUpdate->bind_param("si", $deletedate, $IDReport);
			$success = $stmtUpdate->execute();
			if (!$success) {
				error_log("Execute failed (update): " . $stmtUpdate->error);
			}

			$stmtUpdate->close();
			return $success;
		} else {
			$stmt->close();
			return false;
		}
	}
}
?>


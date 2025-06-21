<?php
include_once 'config.php';

class homeController{
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
		$data = [];

		$query = "SELECT * FROM home WHERE delete_date IS NULL ORDER BY position";
		$stmt = $this->conn->prepare($query);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		if ($stmt->execute()) {
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		} else {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();
		return $data;
	}

	public function getDataByUid($uID) {
		$data = [];

		// Prepare the query securely
		$stmt = $this->conn->prepare("SELECT * FROM home WHERE ID_HM = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data; // or return null;
		}

		// Bind and execute
		$stmt->bind_param("i", $uID); // "i" = integer (use "s" if it's a string)
		if ($stmt->execute()) {
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		} else {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();

		return $data; // Always return an array (can be empty)
	}

	
	public function addReport($ImgEng, $ImgIndo, $position, $createddate) {
		$stmt = $this->conn->prepare(
			"INSERT INTO home (ImgEng, ImgIndo, position, created_date) VALUES (?, ?, ?, ?)"
		);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssis", $ImgEng, $ImgIndo, $position, $createddate); 
		// s = string, i = integer

		$result = $stmt->execute();

		if (!$result) {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();

		return $result;
	} 

	public function updateDataByUID($ImgEng, $ImgIndo, $position, $updatedate, $uID) {
		$stmt = $this->conn->prepare(
			"UPDATE home SET ImgEng = ?, ImgIndo = ?, position = ?, update_date = ? WHERE ID_HM = ?"
		);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssisi", $ImgEng, $ImgIndo, $position, $updatedate, $uID);
		// s = string, i = integer

		$result = $stmt->execute();

		if (!$result) {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();

		return $result;
	} 

	public function updateDataImgIndoByUID($ImgIndo, $position, $updatedate, $uID) {
		$stmt = $this->conn->prepare(
			"UPDATE home SET ImgIndo = ?, position = ?, update_date = ? WHERE ID_HM = ?"
		);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("sisi", $ImgIndo, $position, $updatedate, $uID);
		// s = string, i = integer

		$result = $stmt->execute();

		if (!$result) {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();

		return $result;
	} 

	public function updateDataImgEngByUID($ImgEng, $position, $updatedate, $uID) {
		$stmt = $this->conn->prepare(
			"UPDATE home SET ImgEng = ?, position = ?, update_date = ? WHERE ID_HM = ?"
		);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("sisi", $ImgEng, $position, $updatedate, $uID);
		// "sisi" means: string, integer, string, integer

		$result = $stmt->execute();

		if (!$result) {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();

		return $result;
	}


	public function updateDataPositionByUID($position, $updatedate, $uID) {
		$stmt = $this->conn->prepare(
			"UPDATE home SET position = ?, update_date = ? WHERE ID_HM = ?"
		);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("isi", $position, $updatedate, $uID);
		// i = integer, s = string, i = integer

		$result = $stmt->execute();

		if (!$result) {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();
		return $result;
	}


	public function deleteReport($deletedate, $IDReport) {
		// Check if the report exists
		$stmtCheck = $this->conn->prepare("SELECT ID_HM FROM home WHERE ID_HM = ?");
		if (!$stmtCheck) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmtCheck->bind_param("i", $IDReport);
		$stmtCheck->execute();
		$stmtCheck->store_result();

		if ($stmtCheck->num_rows !== 1) {
			$stmtCheck->close();
			return false;
		}
		$stmtCheck->close();

		// Perform soft delete
		$stmtDelete = $this->conn->prepare("UPDATE home SET delete_date = ? WHERE ID_HM = ?");
		if (!$stmtDelete) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmtDelete->bind_param("si", $deletedate, $IDReport);
		$result = $stmtDelete->execute();
		
		if (!$result) {
			error_log("Delete failed: " . $stmtDelete->error);
		}

		$stmtDelete->close();
		return $result;
	}

}
?>


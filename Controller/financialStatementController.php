<?php
include_once 'config.php';

class financialStatementController{
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

		$query = mysqli_query($this->conn,
			"SELECT * FROM financialstatement 
			WHERE delete_date IS NULL 
			ORDER BY created_date DESC"
		);

		if ($query) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$data[] = $row;
			}
		} else {
			error_log("Query error in getData(): " . mysqli_error($this->conn));
		}

		return $data;
	}


	public function getDatabyYear($year) {
		$data = [];

		$stmt = $this->conn->prepare("
			SELECT * FROM financialstatement 
			WHERE delete_date IS NULL AND tahun = ? 
			ORDER BY created_date DESC
		");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("i", $year);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		} else {
			error_log("Query failed: " . $stmt->error);
		}

		$stmt->close();
		return $data;
	}

	public function getDataLimit($startFrom, $perPage) {
		$data = [];

		$stmt = $this->conn->prepare("
			SELECT * FROM financialstatement 
			WHERE delete_date IS NULL 
			ORDER BY created_date DESC 
			LIMIT ?, ?
		");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("ii", $startFrom, $perPage);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		} else {
			error_log("Query failed: " . $stmt->error);
		}

		$stmt->close();
		return $data;
	}


	public function getDataLimitbyYear($startFrom, $perPage, $year) {
		$data = [];

		$stmt = $this->conn->prepare("
			SELECT * FROM financialstatement 
			WHERE delete_date IS NULL AND tahun = ? 
			ORDER BY created_date DESC 
			LIMIT ?, ?
		");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("iii", $year, $startFrom, $perPage);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		} else {
			error_log("Query failed: " . $stmt->error);
		}

		$stmt->close();
		return $data;
	}

	public function getDataTahun() {
		$data = [];

		$query = mysqli_query($this->conn, 
			"SELECT DISTINCT Tahun 
			FROM financialstatement 
			ORDER BY Tahun DESC"
		);

		if ($query) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$data[] = $row;
			}
		} else {
			error_log("Query error in getDataTahun(): " . mysqli_error($this->conn));
		}

		return $data;
	}

	public function getDataByUid($uID) {
		$data = [];

		$stmt = $this->conn->prepare("
			SELECT * FROM financialstatement 
			WHERE ID_Laporan = ?
		");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("s", $uID);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result && $result->num_rows > 0) {
			$data = $result->fetch_assoc(); // returns a single associative array
		}

		$stmt->close();
		return $data;
	}

	
	public function addReport($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate) {
		// Check if PDF already exists
		$checkStmt = $this->conn->prepare("SELECT ID_Laporan FROM financialstatement WHERE PDF = ?");
		$checkStmt->bind_param("s", $pdf);
		$checkStmt->execute();
		$checkStmt->store_result();

		if ($checkStmt->num_rows === 0) {
			$checkStmt->close();

			// Insert new record
			$insertStmt = $this->conn->prepare("
				INSERT INTO financialstatement 
				(Judul, Title, Tahun, Des, Deskripsi, PDF, created_date) 
				VALUES (?, ?, ?, ?, ?, ?, ?)
			");
			if (!$insertStmt) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}

			$insertStmt->bind_param("ssissss", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate);
			$success = $insertStmt->execute();
			$insertStmt->close();

			return $success;
		} else {
			$checkStmt->close();
			return false;
		}
	}


	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID) {
		// Check if another record already uses the same PDF
		$checkStmt = $this->conn->prepare("
			SELECT ID_Laporan 
			FROM financialstatement 
			WHERE PDF = ? AND ID_Laporan != ?
		");
		if (!$checkStmt) {
			error_log("Check prepare failed: " . $this->conn->error);
			return false;
		}

		$checkStmt->bind_param("si", $pdf, $uID);
		$checkStmt->execute();
		$checkStmt->store_result();

		if ($checkStmt->num_rows > 0) {
			$checkStmt->close();
			return false; // PDF already used in another record
		}
		$checkStmt->close();

		// Proceed with update
		$updateStmt = $this->conn->prepare("
			UPDATE financialstatement 
			SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, PDF = ?, update_date = ?
			WHERE ID_Laporan = ?
		");
		if (!$updateStmt) {
			error_log("Update prepare failed: " . $this->conn->error);
			return false;
		}

		$updateStmt->bind_param("ssissssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID);
		$success = $updateStmt->execute();
		$updateStmt->close();

		return $success;
	}


	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID) {
		$stmt = $this->conn->prepare("
			UPDATE financialstatement 
			SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, update_date = ?
			WHERE ID_Laporan = ?
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
		$stmt = $this->conn->prepare("
			UPDATE financialstatement 
			SET delete_date = ? 
			WHERE ID_Laporan = ?
		");

		if (!$stmt) {
			error_log("Prepare failed in deleteReport(): " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("si", $deletedate, $IDReport);
		$stmt->execute();

		$affected = $stmt->affected_rows;
		$stmt->close();

		return $affected > 0; // return true if a row was actually updated
	} 
}
?>


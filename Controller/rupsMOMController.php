<?php
class rupsMOMController{
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

		$stmt = $this->conn->prepare("SELECT * FROM rupsmom WHERE delete_date IS NULL ORDER BY created_date DESC");
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

	public function getDatabyYear($year) {
		$data = [];

		$stmt = $this->conn->prepare(
			"SELECT * FROM rupsmom 
			WHERE delete_date IS NULL 
			AND tahun = ? 
			ORDER BY created_date DESC"
		);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("s", $year);
		$stmt->execute();

		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	}   

	public function getDataLimit($startFrom, $perPage) {
		$data = [];

		// Sanitize inputs to ensure they are integers
		$startFrom = (int)$startFrom;
		$perPage = (int)$perPage;

		$query = mysqli_query(
			$this->conn,
			"SELECT * FROM rupsmom 
			WHERE delete_date IS NULL 
			ORDER BY created_date DESC 
			LIMIT $startFrom, $perPage"
		);

		if ($query && mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$data[] = $row;
			}
		} elseif (!$query) {
			error_log("Query failed: " . mysqli_error($this->conn));
		}

		return $data;
	} 

	public function getDataLimitbyYear($startFrom, $perPage, $year) {
		$data = [];

		$startFrom = (int)$startFrom;
		$perPage = (int)$perPage;

		$stmt = $this->conn->prepare(
			"SELECT * FROM rupsmom 
			WHERE delete_date IS NULL AND tahun = ? 
			ORDER BY created_date DESC 
			LIMIT ?, ?"
		);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("sii", $year, $startFrom, $perPage);
		$stmt->execute();

		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	}  

	public function getDataTahun() {
		$data = [];

		$query = "SELECT DISTINCT Tahun FROM rupsmom ORDER BY created_date DESC";
		$result = mysqli_query($this->conn, $query);

		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$data[] = $row;
				}
			}
			mysqli_free_result($result);
		} else {
			error_log("Query failed: " . mysqli_error($this->conn));
		}

		return $data; // empty array if no data
	}

	public function getDataByUid($uID) {
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM rupsmom WHERE ID_Laporan = ?");
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
	
	public function addReport($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate) {
		// Check for duplicate PDF
		$checkStmt = $this->conn->prepare("SELECT ID_Laporan FROM rupsmom WHERE PDF = ?");
		if (!$checkStmt) {
			error_log("Prepare failed (check): " . $this->conn->error);
			return false;
		}

		$checkStmt->bind_param("s", $pdf);
		$checkStmt->execute();
		$checkStmt->store_result();

		if ($checkStmt->num_rows === 0) {
			$checkStmt->close();

			// Insert new report
			$insertStmt = $this->conn->prepare(
				"INSERT INTO rupsmom (Judul, Title, Tahun, Des, Deskripsi, PDF, created_date) 
				VALUES (?, ?, ?, ?, ?, ?, ?)"
			);
			if (!$insertStmt) {
				error_log("Prepare failed (insert): " . $this->conn->error);
				return false;
			}

			$insertStmt->bind_param("ssissss", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate);
			$result = $insertStmt->execute();
			$insertStmt->close();

			return $result;
		} else {
			$checkStmt->close();
			return false; // Duplicate PDF
		}
	} 

	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID) {
		// Check for duplicate PDF but exclude the current ID_Laporan
		$checkStmt = $this->conn->prepare("SELECT ID_Laporan FROM rupsmom WHERE PDF = ? AND ID_Laporan != ?");
		if (!$checkStmt) {
			error_log("Prepare failed (check): " . $this->conn->error);
			return false;
		}

		$checkStmt->bind_param("si", $pdf, $uID);
		$checkStmt->execute();
		$checkStmt->store_result();

		if ($checkStmt->num_rows === 0) {
			$checkStmt->close();

			// Proceed to update
			$updateStmt = $this->conn->prepare(
				"UPDATE rupsmom 
				SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, PDF = ?, update_date = ? 
				WHERE ID_Laporan = ?"
			);
			if (!$updateStmt) {
				error_log("Prepare failed (update): " . $this->conn->error);
				return false;
			}

			$updateStmt->bind_param("ssissssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID);
			$result = $updateStmt->execute();
			$updateStmt->close();

			return $result;
		} else {
			$checkStmt->close();
			return false; // Duplicate PDF found on another record
		}
	}


	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID) {
		$stmt = $this->conn->prepare(
			"UPDATE rupsmom 
			SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, update_date = ? 
			WHERE ID_Laporan = ?"
		);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssisssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID);
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	} 

	public function deleteReport($deletedate, $IDReport) {
		// Check if the record exists
		$stmtCheck = $this->conn->prepare("SELECT 1 FROM rupsmom WHERE ID_Laporan = ?");
		if (!$stmtCheck) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmtCheck->bind_param("i", $IDReport);
		$stmtCheck->execute();
		$stmtCheck->store_result();

		if ($stmtCheck->num_rows === 1) {
			$stmtCheck->close();

			// Proceed to soft-delete (set delete_date)
			$stmtUpdate = $this->conn->prepare("UPDATE rupsmom SET delete_date = ? WHERE ID_Laporan = ?");
			if (!$stmtUpdate) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}

			$stmtUpdate->bind_param("si", $deletedate, $IDReport);
			$result = $stmtUpdate->execute();
			$stmtUpdate->close();

			return $result;
		} else {
			$stmtCheck->close();
			return false;
		}
	} 
}
?>


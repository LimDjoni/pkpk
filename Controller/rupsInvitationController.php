<?php
class rupsInvitationController{
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

		$stmt = $this->conn->prepare("SELECT * FROM invitationrups WHERE delete_date IS NULL ORDER BY created_date DESC");
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
			"SELECT * FROM invitationrups 
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
			"SELECT * FROM invitationrups 
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
			"SELECT * FROM invitationrups 
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

		$query = "SELECT DISTINCT Tahun FROM invitationrups ORDER BY created_date DESC";
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

		$stmt = $this->conn->prepare("SELECT * FROM invitationrups WHERE ID_Laporan = ?");
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
		// Check if the PDF already exists
		$stmt = $this->conn->prepare("SELECT 1 FROM invitationrups WHERE PDF = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}
		$stmt->bind_param("s", $pdf);
		$stmt->execute();
		$stmt->store_result();
		$count_row = $stmt->num_rows;
		$stmt->close();

		if ($count_row == 0) {
			// Insert new record
			$stmt = $this->conn->prepare("INSERT INTO invitationrups (Judul, Title, Tahun, Des, Deskripsi, PDF, created_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
			if (!$stmt) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}

			$stmt->bind_param("ssissss", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate);

			if ($stmt->execute()) {
				$stmt->close();
				return true;
			} else {
				error_log("Execute failed: " . $stmt->error);
				$stmt->close();
				return false;
			}
		} else {
			return false; // PDF already exists
		}
	} 

	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID) {
		// Check if another row has the same PDF
		$stmt = $this->conn->prepare("SELECT 1 FROM invitationrups WHERE PDF = ? AND ID_Laporan != ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}
		$stmt->bind_param("si", $pdf, $uID);
		$stmt->execute();
		$stmt->store_result();
		$count_row = $stmt->num_rows;
		$stmt->close();

		if ($count_row == 0) {
			// No duplicate PDF in other records — safe to update
			$stmt = $this->conn->prepare("UPDATE invitationrups SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, PDF = ?, update_date = ? WHERE ID_Laporan = ?");
			if (!$stmt) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}

			$stmt->bind_param("ssissssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID);

			$result = $stmt->execute();
			if (!$result) {
				error_log("Execute failed: " . $stmt->error);
			}

			$stmt->close();
			return $result;
		} else {
			// PDF already exists in a different row
			return false;
		}
	}


	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID) {
		$stmt = $this->conn->prepare("UPDATE invitationrups SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, update_date = ? WHERE ID_Laporan = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssisssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID);
		
		$result = $stmt->execute();
		if (!$result) {
			error_log("Execute failed: " . $stmt->error);
		}

		$stmt->close();
		return $result;
	} 

	public function deleteReport($deletedate, $IDReport) {
		// Prepare SELECT statement to check existence
		$checkStmt = $this->conn->prepare("SELECT ID_Laporan FROM invitationrups WHERE ID_Laporan = ?");
		if (!$checkStmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$checkStmt->bind_param("i", $IDReport);
		$checkStmt->execute();
		$checkStmt->store_result();

		if ($checkStmt->num_rows === 1) {
			$checkStmt->close();

			// Prepare UPDATE statement
			$updateStmt = $this->conn->prepare("UPDATE invitationrups SET delete_date = ? WHERE ID_Laporan = ?");
			if (!$updateStmt) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
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


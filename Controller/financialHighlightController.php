<?php
include_once 'config.php';

class financialHighlightController{
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
			"SELECT * FROM financialhighlight 
			WHERE delete_date IS NULL 
			ORDER BY created_date DESC"
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


	public function getDataTahun(){
		$years = [];

		$query = mysqli_query($this->conn,
			"SELECT DISTINCT Tahun 
			FROM financialhighlight 
			ORDER BY created_date DESC"
		);

		if ($query && mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
				$years[] = $row['Tahun'];
			}
		} elseif (!$query) {
			error_log("Query failed: " . mysqli_error($this->conn));
		}

		return $years;
	}
	

	public function getDataByUid($uID) {
		$data = null;

		$stmt = $this->conn->prepare("SELECT * FROM financialhighlight WHERE ID_Laporan = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("i", $uID);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result && $result->num_rows > 0) {
			$data = $result->fetch_assoc(); // return single row
		}

		$stmt->close();
		return $data;
	}

	
	public function addReport($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate) {
		// Check if the PDF already exists
		$stmt = $this->conn->prepare("SELECT 1 FROM financialhighlight WHERE PDF = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("s", $pdf);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows === 0) {
			$stmt->close();

			// Insert new report
			$stmt = $this->conn->prepare("
				INSERT INTO financialhighlight 
				(Judul, Title, Tahun, Des, Deskripsi, PDF, created_date) 
				VALUES (?, ?, ?, ?, ?, ?, ?)
			");

			if (!$stmt) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}

			$stmt->bind_param("ssissss", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate);
			$result = $stmt->execute();

			if (!$result) {
				error_log("Insert failed: " . $stmt->error);
			}

			$stmt->close();
			return $result;
		} else {
			$stmt->close();
			return false; // Duplicate PDF found
		}
	}


	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID) {
		// Check if the new PDF already exists in another record
		$stmt = $this->conn->prepare("
			SELECT 1 FROM financialhighlight 
			WHERE PDF = ? AND ID_Laporan != ?
		");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("si", $pdf, $uID);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows === 0) {
			$stmt->close();

			// Proceed with update
			$stmt = $this->conn->prepare("
				UPDATE financialhighlight 
				SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, PDF = ?, update_date = ?
				WHERE ID_Laporan = ?
			");

			if (!$stmt) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}

			$stmt->bind_param("ssissssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID);

			$result = $stmt->execute();
			if (!$result) {
				error_log("Update failed: " . $stmt->error);
			}

			$stmt->close();
			return $result;
		} else {
			$stmt->close();
			return false; // Duplicate PDF in another record
		}
	}


	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID) {
		$stmt = $this->conn->prepare("
			UPDATE financialhighlight 
			SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, update_date = ? 
			WHERE ID_Laporan = ?
		");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssisssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID);

		$result = $stmt->execute();
		if (!$result) {
			error_log("Update failed: " . $stmt->error);
		}

		$stmt->close();
		return $result;
	}


	public function deleteReport($deletedate, $IDReport) {
		$stmt = $this->conn->prepare("
			UPDATE financialhighlight 
			SET delete_date = ? 
			WHERE ID_Laporan = ?
		");

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("si", $deletedate, $IDReport);
		$stmt->execute();

		$affectedRows = $stmt->affected_rows;
		$stmt->close();

		return $affectedRows === 1;
	}

}
?>


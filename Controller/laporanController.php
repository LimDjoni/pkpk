<?php
include_once 'config.php';

class laporanController{
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

		$stmt = $this->conn->prepare("SELECT * FROM laporan WHERE delete_date IS NULL ORDER BY created_date DESC");
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

		$stmt = $this->conn->prepare("SELECT * FROM laporan WHERE delete_date IS NULL AND tahun = ? ORDER BY created_date DESC");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("i", $year); // 's' if 'tahun' is a string (change to 'i' if it's an integer)
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

		$stmt = $this->conn->prepare("SELECT * FROM laporan WHERE delete_date IS NULL ORDER BY created_date DESC LIMIT ?, ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("ii", $startFrom, $perPage);
		$stmt->execute();
		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	} 

	public function getDataLimitbyYear($startFrom, $perPage, $year) {
		$data = [];

		$stmt = $this->conn->prepare(
			"SELECT * FROM laporan WHERE delete_date IS NULL AND tahun = ? ORDER BY created_date DESC LIMIT ?, ?"
		);
		
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		// "sii" = string, int, int
		$stmt->bind_param("iii", $year, $startFrom, $perPage);
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

		$stmt = $this->conn->prepare("SELECT DISTINCT Tahun FROM laporan WHERE delete_date IS NULL ORDER BY created_date DESC");
		if (!$stmt) return $data;

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

		$stmt = $this->conn->prepare("SELECT * FROM laporan WHERE ID_Laporan = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("i", $uID); // Use "s" if ID_Laporan is a string
		$stmt->execute();
		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	} 

	public function addReport($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate) {
		// Check if PDF already exists
		$checkQuery = $this->conn->prepare("SELECT ID_Laporan FROM laporan WHERE PDF = ?");
		if (!$checkQuery) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$checkQuery->bind_param("s", $pdf);
		$checkQuery->execute();
		$checkQuery->store_result();

		if ($checkQuery->num_rows > 0) {
			$checkQuery->close();
			return false; // Duplicate found
		}
		$checkQuery->close();

		// Insert new report
		$insertQuery = $this->conn->prepare("INSERT INTO laporan (Judul, Title, Tahun, Des, Deskripsi, PDF, created_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
		if (!$insertQuery) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$insertQuery->bind_param("ssissss", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate);
		$result = $insertQuery->execute();
		$insertQuery->close();

		return $result;
	} 

	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID) {
		// Check if the PDF already exists for a different record (avoid conflict)
		$checkQuery = $this->conn->prepare("SELECT ID_Laporan FROM laporan WHERE PDF = ? AND ID_Laporan != ?");
		if (!$checkQuery) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$checkQuery->bind_param("si", $pdf, $uID);
		$checkQuery->execute();
		$checkQuery->store_result();

		if ($checkQuery->num_rows > 0) {
			$checkQuery->close();
			return false; // Another record with the same PDF exists
		}
		$checkQuery->close();

		// Perform the update
		$updateQuery = $this->conn->prepare("UPDATE laporan SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, PDF = ?, update_date = ? WHERE ID_Laporan = ?");
		if (!$updateQuery) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$updateQuery->bind_param("ssissssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID);
		$result = $updateQuery->execute();
		$updateQuery->close();

		return $result;
	}

	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID) {
		$query = "UPDATE laporan 
				SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, update_date = ? 
				WHERE ID_Laporan = ?";

		$stmt = $this->conn->prepare($query);
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
		// First, check if the report exists
		$checkQuery = "SELECT ID_Laporan FROM laporan WHERE ID_Laporan = ?";
		$stmt = $this->conn->prepare($checkQuery);
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("i", $IDReport);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows !== 1) {
			$stmt->close();
			return false;
		}
		$stmt->close();

		// Proceed to update delete_date
		$updateQuery = "UPDATE laporan SET delete_date = ? WHERE ID_Laporan = ?";
		$stmt = $this->conn->prepare($updateQuery);
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("si", $deletedate, $IDReport);
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	} 
}
?>


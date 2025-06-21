<?php
class rupsAnnouncementController{
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

		$stmt = $this->conn->prepare("SELECT * FROM announcementrups WHERE delete_date IS NULL ORDER BY created_date DESC");
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
			"SELECT * FROM announcementrups 
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
			"SELECT * FROM announcementrups 
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
			"SELECT * FROM announcementrups 
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

		$query = "SELECT DISTINCT Tahun FROM announcementrups ORDER BY created_date DESC";
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

		$stmt = $this->conn->prepare("SELECT * FROM announcementrups WHERE ID_Laporan = ?");
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
	
	public function addReport($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate){
		// Prepare statement to check duplicate PDF
		$stmt = $this->conn->prepare("SELECT 1 FROM announcementrups WHERE PDF = ?");
		$stmt->bind_param("s", $pdf);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows === 0) {
			$stmt->close();

			// Prepare insert statement
			$stmt = $this->conn->prepare("INSERT INTO announcementrups (Judul, Title, Tahun, Des, Deskripsi, PDF, created_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssissss", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate);

			if ($stmt->execute()) {
				$stmt->close();
				return true;
			} else {
				error_log("Insert error: " . $stmt->error);
				$stmt->close();
				return false;
			}
		} else {
			// PDF already exists
			$stmt->close();
			return false;
		}
	} 

	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID){
		// Prepare statement to check if another record has the same PDF (excluding current)
		$stmt = $this->conn->prepare("SELECT 1 FROM announcementrups WHERE PDF = ? AND ID_Laporan <> ?");
		$stmt->bind_param("si", $pdf, $uID);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows === 0) {
			$stmt->close();

			// Prepare update statement
			$stmt = $this->conn->prepare("UPDATE announcementrups SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, PDF = ?, update_date = ? WHERE ID_Laporan = ?");
			$stmt->bind_param("ssissssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID);

			if ($stmt->execute()) {
				$stmt->close();
				return true;
			} else {
				error_log("Update error: " . $stmt->error);
				$stmt->close();
				return false;
			}
		} else {
			// Another record has the same PDF
			$stmt->close();
			return false;
		}
	} 

	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID){
		$stmt = $this->conn->prepare("UPDATE announcementrups SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, update_date = ? WHERE ID_Laporan = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssisssi", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID);

		if ($stmt->execute()) {
			$stmt->close();
			return true;
		} else {
			error_log("Execute failed: " . $stmt->error);
			$stmt->close();
			return false;
		}
	} 

	public function deleteReport($deletedate, $IDReport){
		// Prepare statement to check if the record exists
		$stmt = $this->conn->prepare("SELECT 1 FROM announcementrups WHERE ID_Laporan = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}
		$stmt->bind_param("i", $IDReport);
		$stmt->execute();
		$stmt->store_result();
		$count_row = $stmt->num_rows;
		$stmt->close();

		if ($count_row == 1) {
			// Prepare statement to update the delete_date
			$stmt = $this->conn->prepare("UPDATE announcementrups SET delete_date = ? WHERE ID_Laporan = ?");
			if (!$stmt) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}
			$stmt->bind_param("si", $deletedate, $IDReport);

			if ($stmt->execute()) {
				$stmt->close();
				return true;
			} else {
				error_log("Execute failed: " . $stmt->error);
				$stmt->close();
				return false;
			}
		} else {
			return false; // Record not found
		}
	}
}
?>


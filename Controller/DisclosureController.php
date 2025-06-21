<?php
include_once 'config.php';

class DisclosureController{
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

		$query = mysqli_query($this->conn, "SELECT * FROM keterbukaaninformasi WHERE delete_date IS NULL ORDER BY created_date DESC");

		if ($query && mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$data[] = $row;
			}
		} elseif (!$query) {
			error_log("Query failed: " . mysqli_error($this->conn)); // Log the SQL error
		}

		return $data;
	}

	public function getDatabyYear($year) {
		$data = [];

		$stmt = $this->conn->prepare(
			"SELECT * FROM keterbukaaninformasi 
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
			"SELECT * FROM keterbukaaninformasi 
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
			"SELECT * FROM keterbukaaninformasi 
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
		$years = [];

		$query = mysqli_query(
			$this->conn,
			"SELECT DISTINCT Tahun FROM keterbukaaninformasi ORDER BY created_date DESC"
		);

		if ($query && mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
				$years[] = $row;
			}
		} elseif (!$query) {
			error_log("Query failed: " . mysqli_error($this->conn));
		}

		return $years;
	}

	public function getDataByUid($uID) {
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM keterbukaaninformasi WHERE ID_Laporan = ?");
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
		$stmt = $this->conn->prepare("SELECT 1 FROM keterbukaaninformasi WHERE PDF = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}
		$stmt->bind_param("s", $pdf);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows === 0) {
			$stmt->close();

			// Insert new record
			$stmt = $this->conn->prepare("
				INSERT INTO keterbukaaninformasi 
				(Judul, Title, Tahun, Des, Deskripsi, PDF, created_date) 
				VALUES (?, ?, ?, ?, ?, ?, ?)
			");

			if (!$stmt) {
				error_log("Prepare failed: " . $this->conn->error);
				return false;
			}

			$stmt->bind_param("sssssss", $Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate);

			$result = $stmt->execute();
			if (!$result) {
				error_log("Insert failed: " . $stmt->error);
			}

			$stmt->close();
			return $result;
		} else {
			$stmt->close();
			return false; // PDF already exists
		}
	}


	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID) {
		// Check if another record (not this one) already uses this PDF
		$stmt = $this->conn->prepare(
			"SELECT 1 FROM keterbukaaninformasi WHERE PDF = ? AND ID_Laporan != ?"
		);
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("si", $pdf, $uID);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows === 0) {
			$stmt->close();

			// Perform update
			$stmt = $this->conn->prepare(
				"UPDATE keterbukaaninformasi 
				SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, PDF = ?, update_date = ?
				WHERE ID_Laporan = ?"
			);

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
			return false; // PDF already exists in another record
		}
	}


	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID) {
		$stmt = $this->conn->prepare(
			"UPDATE keterbukaaninformasi 
			SET Judul = ?, Title = ?, Tahun = ?, Des = ?, Deskripsi = ?, update_date = ? 
			WHERE ID_Laporan = ?"
		);

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
		$stmt = $this->conn->prepare(
			"UPDATE keterbukaaninformasi 
			SET delete_date = ? 
			WHERE ID_Laporan = ?"
		);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("si", $deletedate, $IDReport);
		$stmt->execute();

		$affectedRows = $stmt->affected_rows;
		$stmt->close();

		// Check if one row was actually updated
		return ($affectedRows === 1);
	}

}
?>


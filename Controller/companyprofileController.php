<?php
include_once 'config.php';

class companyprofileController{
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
		$query = mysqli_query($this->conn, "SELECT * FROM company_profile WHERE delete_date IS NULL ORDER BY created_date DESC;");
		
		$data = []; // Always initialize as array

		if ($query && mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$data[] = $row;
			}
		}

		return $data;
	}

	public function getDataByUid($uID) {
		$data = [];
		$stmt = mysqli_prepare($this->conn, "SELECT * FROM company_profile WHERE ID_CP = ?");
		mysqli_stmt_bind_param($stmt, "i", $uID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = $row;
		}

		return $data;
	}

	public function updateDataByUID($bodyeng, $bodyindo, $updatedate, $uID) {
		$stmt = $this->conn->prepare("UPDATE company_profile SET body_eng = ?, body_indo = ?, update_date = ? WHERE ID_CP = ?");

		if (!$stmt) {
			die("Prepare failed: " . $this->conn->error);
		}

		$stmt->bind_param("sssi", $bodyeng, $bodyindo, $updatedate, $uID);

		$result = $stmt->execute();

		if (!$result) {
			die("Execute failed: " . $stmt->error);
		}

		$stmt->close();
		return $result;
	} 
}
?>


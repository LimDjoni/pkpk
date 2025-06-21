<?php
class subheaderController{
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

		$stmt = $this->conn->prepare("SELECT * FROM subheader WHERE delete_date IS NULL ORDER BY created_date DESC");
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

	public function getDataByUid($uID) {
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM subheader WHERE ID = ?");
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

	public function getExcDataDivision($idSubHeader) {
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM subheader WHERE ID != ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return "-";
		}

		$stmt->bind_param("i", $idSubHeader); // "i" for integer
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows === 0) {
			return "-";
		}

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	} 

	public function getDataByPageEnglish($page) {
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM subheader WHERE pageEng = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return "-";
		}

		$stmt->bind_param("s", $page); // "s" = string
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows === 0) {
			return "-";
		}

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	} 

	public function getDataByPageIndonesia($page) {
		$data = [];

		$stmt = $this->conn->prepare("SELECT * FROM subheader WHERE pageInd = ?");
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return "-";
		}

		$stmt->bind_param("s", $page); // "s" = string
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows === 0) {
			return "-";
		}

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		$stmt->close();
		return $data;
	} 
	
	public function addReport($pageInd, $pageEng, $PageNameInd, $PageNameEng, $subheader, $desc, $createddate) {
		$dataInserted = false;

		$query = "INSERT INTO subheader (pageInd, pageEng, PageNameInd, PageNameEng, sub_header, description, created_date) 
				VALUES (?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = $this->conn->prepare($query);
		
		if ($stmt) {
			$stmt->bind_param("sssssss", $pageInd, $pageEng, $PageNameInd, $PageNameEng, $subheader, $desc, $createddate);
			$dataInserted = $stmt->execute();
			$stmt->close();
		} else {
			error_log("Prepare failed: " . $this->conn->error);
		}

		return $dataInserted;
	} 

	public function updateDataByUID($pageInd, $pageEng, $PageNameInd, $PageNameEng, $subheader, $desc, $updatedate, $uID) {
		$query = "UPDATE subheader 
				SET pageInd = ?, pageEng = ?, PageNameInd = ?, PageNameEng = ?, sub_header = ?, description = ?, update_date = ? 
				WHERE ID = ?";

		$stmt = $this->conn->prepare($query);
		
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("sssssssi", $pageInd, $pageEng, $PageNameInd, $PageNameEng, $subheader, $desc, $updatedate, $uID);
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	} 
	
	public function updateDataWithoutFileByUID($pageInd, $pageEng, $PageNameInd, $PageNameEng, $desc, $updatedate, $uID) {
		$query = "UPDATE subheader 
				SET pageInd = ?, pageEng = ?, PageNameInd = ?, PageNameEng = ?, description = ?, update_date = ? 
				WHERE ID = ?";

		$stmt = $this->conn->prepare($query);

		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssssssi", $pageInd, $pageEng, $PageNameInd, $PageNameEng, $desc, $updatedate, $uID);
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	} 

	public function deleteReport($deletedate, $IDReport) {
		// Check if the record exists
		$checkQuery = "SELECT 1 FROM subheader WHERE ID = ?";
		$checkStmt = $this->conn->prepare($checkQuery);

		if (!$checkStmt) {
			error_log("Prepare failed (check): " . $this->conn->error);
			return false;
		}

		$checkStmt->bind_param("i", $IDReport);
		$checkStmt->execute();
		$checkStmt->store_result();

		if ($checkStmt->num_rows === 1) {
			$checkStmt->close();

			// Update the delete_date
			$updateQuery = "UPDATE subheader SET delete_date = ? WHERE ID = ?";
			$updateStmt = $this->conn->prepare($updateQuery);

			if (!$updateStmt) {
				error_log("Prepare failed (update): " . $this->conn->error);
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


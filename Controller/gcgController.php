<?php
include_once 'config.php';

class gcgController{
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

		$sql = "
			SELECT * 
			FROM gcg 
			JOIN gcg2 ON gcg.ID_GCG = gcg2.ID_GCG 
			WHERE gcg.delete_date IS NULL 
			ORDER BY gcg.created_date DESC
		";

		$result = mysqli_query($this->conn, $sql);

		if (!$result) {
			error_log("Query error in getData(): " . mysqli_error($this->conn));
			return $data;
		}

		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}

		return $data;
	}


	public function getDataByUid($uID) {
		$data = [];

		$stmt = $this->conn->prepare("
			SELECT * 
			FROM gcg 
			JOIN gcg2 ON gcg.ID_GCG = gcg2.ID_GCG 
			WHERE gcg.ID_GCG = ?
		");

		if (!$stmt) {
			error_log("Prepare failed in getDataByUid(): " . $this->conn->error);
			return $data;
		}

		$stmt->bind_param("i", $uID);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result && $result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}

		$stmt->close();
		return $data;
	} 

	public function updateDataByUID(
		$OverviewEng, $OverviewInd, $RaNEng, $RaNInd, $IAEng, $IAInd,
		$ICEng, $ICInd, $RMEng, $RMInd, $COCEng, $COCInd, $WhistleEng, $WhistleInd,
		$IaDEng, $IaDInd, $updatedate, $uID
	) {
		// Begin transaction
		$this->conn->begin_transaction();

		try {
			// Update gcg
			$stmt1 = $this->conn->prepare("
				UPDATE gcg 
				SET OverviewEng=?, OverviewInd=?, RaNEng=?, RaNInd=?, 
					IAEng=?, IAInd=?, ICEng=?, ICInd=?, 
					RMEng=?, RMInd=?, update_date=? 
				WHERE ID_GCG=?
			");
			$stmt1->bind_param(
				"sssssssssssi", 
				$OverviewEng, $OverviewInd, $RaNEng, $RaNInd,
				$IAEng, $IAInd, $ICEng, $ICInd,
				$RMEng, $RMInd, $updatedate, $uID
			);
			$stmt1->execute();
			$stmt1->close();

			// Update gcg2
			$stmt2 = $this->conn->prepare("
				UPDATE gcg2 
				SET COCEng=?, COCInd=?, WhistleEng=?, WhistleInd=?, 
					IaDEng=?, IaDInd=?, update_date=? 
				WHERE ID_GCG=?
			");
			$stmt2->bind_param(
				"sssssssi", 
				$COCEng, $COCInd, $WhistleEng, $WhistleInd, 
				$IaDEng, $IaDInd, $updatedate, $uID
			);
			$stmt2->execute();
			$stmt2->close();

			// Commit if both succeed
			$this->conn->commit();
			return true;

		} catch (Exception $e) {
			// Rollback on any failure
			$this->conn->rollback();
			error_log("Update failed: " . $e->getMessage());
			return false;
		}
	}

}
?>


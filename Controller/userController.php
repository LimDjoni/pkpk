<?php
class userController{
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

		$stmt = $this->conn->prepare("SELECT * FROM user WHERE delete_date IS NULL ORDER BY created_date DESC");
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

		$stmt = $this->conn->prepare("SELECT * FROM user WHERE ID_Laporan = ?");
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

	public function updateDataByUID($userName, $email, $firstName, $lastName, $Address, $City, $Country, $phonenumber, $aboutme, $updatedate, $uID) {
		$query = "UPDATE user 
				SET username = ?, email_address = ?, firstname = ?, lastname = ?, 
					address = ?, city = ?, country = ?, phone_number = ?, 
					about_me = ?, update_date = ? 
				WHERE id_user = ?";

		$stmt = $this->conn->prepare($query);
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("ssssssssssi", 
			$userName, $email, $firstName, $lastName, 
			$Address, $City, $Country, $phonenumber, 
			$aboutme, $updatedate, $uID
		);

		$result = $stmt->execute();
		$stmt->close();

		return $result;
	} 

	public function check_login($username, $password){
		$query = "SELECT * FROM user WHERE username = ?";
		$stmt = $this->conn->prepare($query);
		
		if (!$stmt) {
			error_log("Prepare failed: " . $this->conn->error);
			return false;
		}

		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result && $result->num_rows === 1) {
			$user_data = $result->fetch_assoc();

			if (password_verify($password, $user_data['password'])) {
				// Set session
				$_SESSION['login'] = true;
				$_SESSION['ID'] = $user_data['id_user']; 
				$_SESSION['Firstname'] = $user_data['firstname'];
				$_SESSION['Lastname'] = $user_data['lastname'];
				return true;
			}
		}

		return false;
	}

	public function user_logout() {
		$_SESSION['login'] = FALSE;
		session_destroy();
	}
}
?>
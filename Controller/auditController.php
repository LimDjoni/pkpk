<?php
include_once 'config.php';

class auditController{
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

		$query = mysqli_query($this->conn, "SELECT * FROM audit");

		if ($query && mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$data[] = $row;
			}
		}

		return $data;
	} 
}
?>
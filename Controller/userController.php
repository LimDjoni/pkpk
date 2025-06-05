<?php
class userController{
	protected $conn;

	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM user");
		$jumdata= mysqli_num_rows($query);
		if($jumdata==0){
			$data="-";
		} else{
			while($row = mysqli_fetch_array($query)){
				$data[]=$row;
			}
		}
		return $data;
	}

	public function getDataByUid($uID){
		$query = mysqli_query($this->conn,"SELECT * FROM user WHERE id_user='$uID'");
		$jumdata= mysqli_num_rows($query);
		if($jumdata==0){
			$data="-";
		} else{
			while($row = mysqli_fetch_array($query)){
				$data[]=$row;
			}
		}
		return $data;
	}

	public function updateDataByUID($userName, $email, $firstName, $lastName, $Address, $City, $Country, $phonenumber, $aboutme, $updatedate, $uID){
		$query = "UPDATE user SET username = '$userName', email_address = '$email', firstname = '$firstName', lastname = '$lastName', address = '$Address', city = '$City', country = '$Country', phone_number = '$phonenumber', about_me = '$aboutme', update_date = '$updatedate' WHERE id_user = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}

	public function check_login($username, $password){
		$query = "SELECT * FROM user WHERE username='$username' and password='$password'";

		  //checking if the username is available in the table
		$result = mysqli_query($this->conn,$query);
		$user_data = mysqli_fetch_array($result);
		$count_row = $result->num_rows;

		if ($count_row == 1) {
			   // this login var will use for the session thing
			$_SESSION['login'] = true;
			$_SESSION['ID'] = $user_data['id_user']; 
			$_SESSION['Firstname'] = $user_data['firstname'];
			$_SESSION['Lastname'] = $user_data['lastname'];
			return true;
		}
		else{
			return false;
		}
	} 

	public function user_logout() {
		$_SESSION['login'] = FALSE;
		session_destroy();
	}
}
?>
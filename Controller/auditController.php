<?php
class auditController{
	protected $conn;

	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM audit");
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

	public function getDataFY2016(){
		$query = mysqli_query($this->conn,"SELECT * FROM audit WHERE Year='FY2016'");
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

	public function getDataFY2017(){
		$query = mysqli_query($this->conn,"SELECT * FROM audit WHERE Year='FY2017'");
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

	public function getDataFY2018(){
		$query = mysqli_query($this->conn,"SELECT * FROM audit WHERE Year='FY2018'");
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

	public function getDataFY2019(){
		$query = mysqli_query($this->conn,"SELECT * FROM audit WHERE Year='FY2019'");
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

	public function getDataFY2020(){
		$query = mysqli_query($this->conn,"SELECT * FROM audit WHERE Year='FY2020'");
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


	// public function getDataByUid($uID){
	// 	$query = mysqli_query($this->conn,"SELECT * FROM audit WHERE id_user='$uID'");
	// 	$jumdata= mysqli_num_rows($query);
	// 	if($jumdata==0){
	// 		$data="-";
	// 	} else{
	// 		while($row = mysqli_fetch_array($query)){
	// 			$data[]=$row;
	// 		}
	// 	}
	// 	return $data;
	// }

	// public function updateDataByUID($userName, $email, $firstName, $lastName, $Address, $City, $Country, $phonenumber, $aboutme, $updatedate, $uID){
	// 	$query = "UPDATE audit SET username = '$userName', email_address = '$email', firstname = '$firstName', lastname = '$lastName', address = '$Address', city = '$City', country = '$Country', phone_number = '$phonenumber', about_me = '$aboutme', update_date = '$updatedate' WHERE id_user = '$uID'";
	// 	$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
	// 	return $result;
	// }
}
?>
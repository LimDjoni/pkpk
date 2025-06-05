<?php
class managementController{
	protected $conn;
 
	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}
	
	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM management WHERE delete_date IS NULL ORDER BY created_date DESC");
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
		$query = mysqli_query($this->conn,"SELECT * FROM management WHERE ID_M='$uID'");
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
	
	public function addReport($Overview, $bocEng, $bocIndo, $bodEng, $bodIndo, $acEng, $acIndo, $csEng, $csIndo, $createddate){  
		$bocEng = mysqli_real_escape_string($this->conn,$bocEng); 
		$bocIndo = mysqli_real_escape_string($this->conn,$bocIndo); 
		$bodEng = mysqli_real_escape_string($this->conn,$bodEng); 
		$bodIndo = mysqli_real_escape_string($this->conn,$bodIndo); 
		$acEng = mysqli_real_escape_string($this->conn,$acEng); 
		$acIndo = mysqli_real_escape_string($this->conn,$acIndo); 
		$csEng = mysqli_real_escape_string($this->conn,$csEng); 
		$csIndo = mysqli_real_escape_string($this->conn,$csIndo);  
		$query="INSERT INTO management(Overview, bocEng, bocIndo, bodEng, bodIndo, acEng, acIndo, csEng, csIndo, created_date) VALUES ('$Overview', '$bocEng', '$bocIndo', '$bodEng', '$bodIndo', '$acEng', '$acIndo', '$csEng', '$csIndo', '$createddate')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	} 

	public function updateDataByUID($Overview, $bocEng, $bocIndo, $bodEng, $bodIndo, $acEng, $acIndo, $csEng, $csIndo, $updatedate, $uID){  
		$bocEng = mysqli_real_escape_string($this->conn,$bocEng); 
		$bocIndo = mysqli_real_escape_string($this->conn,$bocIndo); 
		$bodEng = mysqli_real_escape_string($this->conn,$bodEng); 
		$bodIndo = mysqli_real_escape_string($this->conn,$bodIndo); 
		$acEng = mysqli_real_escape_string($this->conn,$acEng); 
		$acIndo = mysqli_real_escape_string($this->conn,$acIndo); 
		$csEng = mysqli_real_escape_string($this->conn,$csEng); 
		$csIndo = mysqli_real_escape_string($this->conn,$csIndo);  
		$query = "UPDATE management SET Overview = '$Overview', bocEng = '$bocEng', bocIndo = '$bocIndo', bodEng = '$bodEng', bodIndo = '$bodIndo', acEng = '$acEng', acIndo = '$acIndo', csEng = '$csEng', csIndo = '$csIndo', update_date = '$updatedate' WHERE ID_M = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_error()."Data cannot inserted");
		return $result; 
	} 

	public function updateDataWithoutFileByUID($bocEng, $bocIndo, $bodEng, $bodIndo, $acEng, $acIndo, $csEng, $csIndo, $updatedate, $uID){  
		$bocEng = mysqli_real_escape_string($this->conn,$bocEng); 
		$bocIndo = mysqli_real_escape_string($this->conn,$bocIndo); 
		$bodEng = mysqli_real_escape_string($this->conn,$bodEng); 
		$bodIndo = mysqli_real_escape_string($this->conn,$bodIndo); 
		$acEng = mysqli_real_escape_string($this->conn,$acEng); 
		$acIndo = mysqli_real_escape_string($this->conn,$acIndo); 
		$csEng = mysqli_real_escape_string($this->conn,$csEng); 
		$csIndo = mysqli_real_escape_string($this->conn,$csIndo);  
		$query = "UPDATE management SET bocEng = '$bocEng', bocIndo = '$bocIndo', bodEng = '$bodEng', bodIndo = '$bodIndo', acEng = '$acEng', acIndo = '$acIndo', csEng = '$csEng', csIndo = '$csIndo', update_date = '$updatedate' WHERE ID_M = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_error()."Data cannot inserted");
		return $result; 
	} 

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM management WHERE ID_M='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE management SET delete_date = '$deletedate' WHERE ID_M='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


<?php
class companyprofileController{
	protected $conn;

	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM company_profile WHERE delete_date IS NULL ORDER BY created_date DESC;");
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
		$query = mysqli_query($this->conn,"SELECT * FROM company_profile WHERE ID_CP='$uID'");
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
	
	public function addReport($bodyeng, $bodyindo, $createddate){
		$BodyEng = mysqli_real_escape_string($this->conn,$bodyeng); 
		$BodyInd = mysqli_real_escape_string($this->conn,$bodyindo); 
		$query="INSERT INTO company_profile(body_eng, body_indo, created_date) VALUES ('$BodyEng', '$BodyInd', '$createddate')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataByUID($bodyeng, $bodyindo, $updatedate, $uID){
		$BodyEng = mysqli_real_escape_string($this->conn,$bodyeng); 
		$BodyInd = mysqli_real_escape_string($this->conn,$bodyindo);
		$query = "UPDATE company_profile SET body_eng = '$BodyEng', body_indo = '$BodyInd', update_date = '$updatedate' WHERE ID_CP = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}  

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM company_profile WHERE ID='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE company_profile SET delete_date = '$deletedate' WHERE ID_CP='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


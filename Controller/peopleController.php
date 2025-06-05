<?php
class peopleController{
	protected $conn;
 
	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM people WHERE delete_date IS NULL ORDER BY created_date");
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
		$query = mysqli_query($this->conn,"SELECT * FROM people WHERE ID_People='$uID'");
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

	public function getDataByStatus($Stat){
		$query = mysqli_query($this->conn,"SELECT * FROM people WHERE Status='$Stat' AND delete_date IS NULL");
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

	public function addReport($Name, $Jabatan, $Position, $Deskripsi, $Des, $img, $Status, $createddate){  
		$query="INSERT INTO people(Name, Jabatan, Position, Deskripsi, Des, Img, Status, created_date) VALUES ('$Name', '$Jabatan', '$Position', '$Deskripsi', '$Des', '$img', '$Status', '$createddate')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataByUID($Name, $Jabatan, $Position, $Deskripsi, $Des, $img, $Status, $updatedate, $uID){ 
		$query = "UPDATE people SET Name = '$Name', Jabatan = '$Jabatan', Position = '$Position', Deskripsi = '$Deskripsi', Des = '$Des',  img = '$img',  Status = '$Status', update_date = '$updatedate' WHERE ID_People = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataWithoutFileByUID($Name, $Jabatan, $Position, $Deskripsi, $Des, $Status, $updatedate, $uID){
		$query = "UPDATE people SET Name = '$Name', Jabatan = '$Jabatan', Position = '$Position', Deskripsi = '$Deskripsi', Des = '$Des', Status = '$Status', update_date = '$updatedate' WHERE ID_People = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM people WHERE ID_People='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE people SET delete_date = '$deletedate' WHERE ID_People='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


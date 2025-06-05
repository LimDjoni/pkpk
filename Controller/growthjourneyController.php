<?php
class growthjourneyController{
	protected $conn;
 
	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM growth_journey WHERE delete_date IS NULL ORDER BY created_date");
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
		$query = mysqli_query($this->conn,"SELECT * FROM growth_journey WHERE ID_GJ='$uID'");
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

	public function addReport($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $createddate){  
		$query="INSERT INTO growth_journey(Judul, title, Tahun, Des, Deskripsi, PDF, created_date) VALUES ('$Judul', '$Title', '$Tahun', '$Desc', '$Deskripsi', '$pdf', '$createddate')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID){ 
		$query = "UPDATE growth_journey SET Judul = '$Judul', title = '$Title', Tahun = '$Tahun', Des = '$Desc', Deskripsi = '$Deskripsi', PDF = '$pdf', update_date = '$updatedate' WHERE ID_GJ = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID){
		$query = "UPDATE growth_journey SET Judul = '$Judul', title = '$Title', Tahun = '$Tahun', Des = '$Desc', Deskripsi = '$Deskripsi', update_date = '$updatedate' WHERE ID_GJ = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM growth_journey WHERE ID_GJ='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE growth_journey SET delete_date = '$deletedate' WHERE ID_GJ='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


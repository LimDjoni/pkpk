<?php
class homeController{
	protected $conn;

	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM home WHERE delete_date IS NULL ORDER BY position;");
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
		$query = mysqli_query($this->conn,"SELECT * FROM home WHERE ID_HM='$uID'");
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
	
	public function addReport($ImgEng, $ImgIndo, $position, $createddate){ 
		$query="INSERT INTO home(ImgEng, ImgIndo, position, created_date) VALUES ('$ImgEng', '$ImgIndo', '$position', '$createddate')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataByUID($ImgEng, $ImgIndo, $position, $updatedate, $uID){ 
		$query = "UPDATE home SET ImgEng = '$ImgEng', ImgIndo = '$ImgIndo', position = '$position', update_date = '$updatedate' WHERE ID_HM = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}  


	public function updateDataImgIndoByUID($ImgIndo, $position, $updatedate, $uID){ 
		$query = "UPDATE home SET ImgIndo = '$ImgIndo', position = '$position', update_date = '$updatedate' WHERE ID_HM = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}  

	public function updateDataImgEngByUID($ImgEng, $position, $updatedate, $uID){ 
		$query = "UPDATE home SET ImgEng = '$ImgEng', position = '$position', update_date = '$updatedate' WHERE ID_HM = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}  

	public function updateDataPositionByUID($position, $updatedate, $uID){ 
		$query = "UPDATE home SET position = '$position', update_date = '$updatedate' WHERE ID_HM = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}  

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM home WHERE ID_HM='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE home SET delete_date = '$deletedate' WHERE ID_HM='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


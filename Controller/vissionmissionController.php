<?php
class vissionmissionController{
	protected $conn;

	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM vission_mission WHERE delete_date IS NULL ORDER BY created_date DESC;");
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
		$query = mysqli_query($this->conn,"SELECT * FROM vission_mission WHERE ID_VM='$uID'");
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
	
	public function addReport($Vission, $Visi, $Mission, $Misi, $Motto, $Moto, $Phylosophy, $Filosofi, $date){
		$vission = mysqli_real_escape_string($this->conn, $Vission);
		$visi = mysqli_real_escape_string($this->conn,$Visi);
		$mission = mysqli_real_escape_string($this->conn,$Mission);
		$misi = mysqli_real_escape_string($this->conn,$Misi);
		$motto = mysqli_real_escape_string($this->conn,$Motto);
		$moto = mysqli_real_escape_string($this->conn,$Moto);
		$phylosophy = mysqli_real_escape_string($this->conn,$Phylosophy);
		$filosofi = mysqli_real_escape_string($this->conn,$Filosofi); 
		$query="INSERT INTO vission_mission(vission, visi, mission, misi, motto, moto, phylosophy, filosofi, created_date) VALUES ('$vission', '$visi', '$mission', '$misi', '$motto', '$moto','$phylosophy', '$filosofi', '$date')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataByUID($Vission, $Visi, $Mission, $Misi, $Motto, $Moto, $Phylosophy, $Filosofi, $date, $id){
		$vission = mysqli_real_escape_string($this->conn, $Vission);
		$visi = mysqli_real_escape_string($this->conn,$Visi);
		$mission = mysqli_real_escape_string($this->conn,$Mission);
		$misi = mysqli_real_escape_string($this->conn,$Misi);
		$motto = mysqli_real_escape_string($this->conn,$Motto);
		$moto = mysqli_real_escape_string($this->conn,$Moto);
		$phylosophy = mysqli_real_escape_string($this->conn,$Phylosophy);
		$filosofi = mysqli_real_escape_string($this->conn,$Filosofi); 
		$query = "UPDATE vission_mission SET vission = '$vission', visi = '$visi', mission = '$mission', misi = '$misi', motto = '$motto', moto = '$moto', phylosophy = '$phylosophy', filosofi = '$filosofi', update_date = '$date' WHERE ID_VM = '$id'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}  

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM vission_mission WHERE ID_VM='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE vission_mission SET delete_date = '$deletedate' WHERE ID_VM='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


<?php
class ourBusinessesController{
	protected $conn;

	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM our_businesses WHERE delete_date IS NULL ORDER BY created_date DESC;");
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
		$query = mysqli_query($this->conn,"SELECT * FROM our_businesses WHERE ID_OB='$uID'");
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
	
	public function addReport($mining, $tambang, $equipment, $perlengkapan, $land, $lahan, $construction, $konstruksi, $date){
		$mining = mysqli_real_escape_string($this->conn, $mining);
		$tambang = mysqli_real_escape_string($this->conn,$tambang);
		$equipment = mysqli_real_escape_string($this->conn,$equipment);
		$perlengkapan = mysqli_real_escape_string($this->conn,$perlengkapan);
		$land = mysqli_real_escape_string($this->conn,$land);
		$lahan = mysqli_real_escape_string($this->conn,$lahan);
		$construction = mysqli_real_escape_string($this->conn,$construction);
		$konstruksi = mysqli_real_escape_string($this->conn,$konstruksi); 
		$query="INSERT INTO our_businesses(mining, tambang, equipment, perlengkapan, land, lahan, construction, konstruksi, created_date) VALUES ('$mining', '$tambang', '$equipment', '$perlengkapan', '$land', '$lahan','$construction', '$konstruksi', '$date')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataByUID($mining, $tambang, $equipment, $perlengkapan, $land, $lahan, $construction, $konstruksi, $date, $id){
		$mining = mysqli_real_escape_string($this->conn, $mining);
		$tambang = mysqli_real_escape_string($this->conn,$tambang);
		$equipment = mysqli_real_escape_string($this->conn,$equipment);
		$perlengkapan = mysqli_real_escape_string($this->conn,$perlengkapan);
		$land = mysqli_real_escape_string($this->conn,$land);
		$lahan = mysqli_real_escape_string($this->conn,$lahan);
		$construction = mysqli_real_escape_string($this->conn,$construction);
		$konstruksi = mysqli_real_escape_string($this->conn,$konstruksi); 
		$query = "UPDATE our_businesses SET mining = '$mining', tambang = '$tambang', equipment = '$equipment', perlengkapan = '$perlengkapan', land = '$land', lahan = '$lahan', construction = '$construction', konstruksi = '$konstruksi', update_date = '$date' WHERE ID_OB = '$id'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}  

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM our_businesses WHERE ID_OB='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE our_businesses SET delete_date = '$deletedate' WHERE ID_OB='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


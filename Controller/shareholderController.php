<?php
class shareholderController{
	protected $conn;

	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM shareholder WHERE delete_date IS NULL ORDER BY created_date;");
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
		$query = mysqli_query($this->conn,"SELECT * FROM shareholder WHERE ID_SH='$uID'");
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
	
	public function addReport($shareholder_name, $nama_pemegangsaham, $NOS, $percent, $date){
		$shareholder_name = mysqli_real_escape_string($this->conn, $shareholder_name);
		$nama_pemegangsaham = mysqli_real_escape_string($this->conn,$nama_pemegangsaham);
		$NOS = mysqli_real_escape_string($this->conn,$NOS);
		$percent = mysqli_real_escape_string($this->conn,$percent);
		$query="INSERT INTO shareholder(shareholder_name, nama_pemegangsaham, NOS, percent, created_date) VALUES ('$shareholder_name', '$nama_pemegangsaham', '$NOS', '$percent', '$date')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataByUID($shareholder_name, $nama_pemegangsaham, $NOS, $percent, $date, $id){
		$shareholder_name = mysqli_real_escape_string($this->conn, $shareholder_name);
		$nama_pemegangsaham = mysqli_real_escape_string($this->conn,$nama_pemegangsaham);
		$NOS = mysqli_real_escape_string($this->conn,$NOS);
		$percent = mysqli_real_escape_string($this->conn,$percent); 
		$query = "UPDATE shareholder SET shareholder_name = '$shareholder_name', nama_pemegangsaham = '$nama_pemegangsaham', NOS = '$NOS', percent = '$percent', update_date = '$date' WHERE ID_SH = '$id'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}  

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM shareholder WHERE ID_SH='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE shareholder SET delete_date = '$deletedate' WHERE ID_SH='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


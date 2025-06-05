<?php
class rupsAnnouncementController{
	protected $conn;
 
	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	} 
	
	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM announcementrups WHERE delete_date IS NULL ORDER BY created_date DESC");
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

	public function getDatabyYear($year){
		$query = mysqli_query($this->conn,"SELECT * FROM announcementrups WHERE delete_date IS NULL AND tahun = '$year' ORDER BY created_date DESC");
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

	public function getDataLimit($startFrom, $perPage){
		$query = mysqli_query($this->conn,"SELECT * FROM announcementrups WHERE delete_date IS NULL ORDER BY created_date DESC LIMIT $startFrom, $perPage");
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

	public function getDataLimitbyYear($startFrom, $perPage, $year){
		$query = mysqli_query($this->conn,"SELECT * FROM announcementrups WHERE delete_date IS NULL AND tahun = '$year' ORDER BY created_date DESC LIMIT $startFrom, $perPage");
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

	public function getDataTahun(){
		$query = mysqli_query($this->conn,"SELECT DISTINCT Tahun FROM announcementrups ORDER BY created_date DESC");
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
		$query = mysqli_query($this->conn,"SELECT * FROM announcementrups WHERE ID_Laporan='$uID'");
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
		$query="SELECT * FROM announcementrups WHERE PDF = '$pdf'";
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 0){
			$query="INSERT INTO announcementrups(Judul, Title, Tahun, Des, Deskripsi, PDF, created_date) VALUES ('$Judul', '$Title', '$Tahun', '$Desc', '$Deskripsi', '$pdf', '$createddate')";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
		}
		else{
			return false;
		}
	}

	public function updateDataByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $pdf, $updatedate, $uID){
		$query="SELECT * FROM announcementrups WHERE PDF = '$pdf'";
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 0){
			$query = "UPDATE announcementrups SET Judul = '$Judul', Title = '$Title', Tahun = '$Tahun', Des = '$Desc', Deskripsi = '$Deskripsi', PDF = '$pdf', update_date = '$updatedate' WHERE ID_Laporan = '$uID'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
		}
		else{
			return false;
		}
	}

	public function updateDataWithoutFileByUID($Judul, $Title, $Tahun, $Desc, $Deskripsi, $updatedate, $uID){
		$query = "UPDATE announcementrups SET Judul = '$Judul', Title = '$Title', Tahun = '$Tahun', Des = '$Desc', Deskripsi = '$Deskripsi', update_date = '$updatedate' WHERE ID_Laporan = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM announcementrups WHERE ID_Laporan='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE announcementrups SET delete_date = '$deletedate' WHERE ID_Laporan='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


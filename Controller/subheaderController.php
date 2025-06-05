<?php
class subheaderController{
	protected $conn;

	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}

	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM subheader WHERE delete_date IS NULL ORDER BY created_date DESC;");
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
		$query = mysqli_query($this->conn,"SELECT * FROM subheader WHERE ID='$uID'");
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

	public function getExcDataDivision($idSubHeader){
		$query = mysqli_query($this->conn,"SELECT * FROM subheader WHERE ID!='$idSubHeader'");
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

	public function getDataByPageEnglish($page){
		$query = mysqli_query($this->conn,"SELECT * FROM subheader WHERE pageEng='$page'");
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

	public function getDataByPageIndonesia($page){
		$query = mysqli_query($this->conn,"SELECT * FROM subheader WHERE pageInd='$page'");
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
	
	public function addReport($pageInd, $pageEng, $PageNameInd, $PageNameEng, $subheader, $desc, $createddate){
		$Desc = mysqli_real_escape_string($this->conn,$desc);  
		$query="INSERT INTO subheader(pageInd, pageEng, PageNameInd, PageNameEng, sub_header, description, created_date) VALUES ('$pageInd' ,'$pageEng', '$PageNameInd' ,'$PageNameEng', '$subheader', '$Desc', '$createddate')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result; 
	}

	public function updateDataByUID($pageInd, $pageEng, $PageNameInd, $PageNameEng, $subheader, $desc, $updatedate, $uID){
		$Desc = mysqli_real_escape_string($this->conn,$desc);  
		$query = "UPDATE subheader SET pageInd = '$pageInd', pageEng = '$pageEng', PageNameInd = '$PageNameInd', PageNameEng = '$PageNameEng', sub_header = '$subheader', description = '$Desc', update_date = '$updatedate' WHERE ID = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	} 
	
	public function updateDataWithoutFileByUID($pageInd, $pageEng, $PageNameInd, $PageNameEng, $desc, $updatedate, $uID){
		$Desc = mysqli_real_escape_string($this->conn,$desc);  
		$query = "UPDATE subheader SET pageInd = '$pageInd', pageEng = '$pageEng', PageNameInd = '$PageNameInd', PageNameEng = '$PageNameEng', description = '$Desc', update_date = '$updatedate' WHERE ID = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM subheader WHERE ID='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE subheader SET delete_date = '$deletedate' WHERE ID='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result; 
		}
		else { 
			return false;
		}
	}
}
?>


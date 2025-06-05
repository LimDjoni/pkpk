<?php
class gcgController{
	protected $conn;
 
	// public function __construct(){
	// 	$this->conn = mysqli_connect("192.168.100.88", "deli", "Deli123", "website", "3306"); //(host, username, password, database, port)
	// }

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "pkpktbk1_pkpk", "Pkpk_1234!", "pkpktbk1_website", "3306"); //(host, username, password, database, port)
	}
	
	public function getData(){
		$query = mysqli_query($this->conn,"SELECT * FROM gcg JOIN gcg2 ON gcg.ID_GCG = gcg2.ID_GCG WHERE gcg.delete_date IS NULL ORDER BY gcg.created_date DESC");
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
		$query = mysqli_query($this->conn,"SELECT * FROM gcg JOIN gcg2 ON gcg.ID_GCG = gcg2.ID_GCG WHERE gcg.ID_GCG='$uID'");
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
	
	public function addReport($OverviewEng, $OverviewInd, $RaNEng, $RaNInd, $IAEng, $IAInd, $ICEng, $ICInd, $RMEng, $RMInd, $COCEng, $COCInd, $WhistleEng, $WhistleInd, $IaDEng, $IaDInd, $createddate){ 
		$OverviewEng = mysqli_real_escape_string($this->conn,$OverviewEng); 
		$OverviewInd = mysqli_real_escape_string($this->conn,$OverviewInd); 
		$RaNEng = mysqli_real_escape_string($this->conn,$RaNEng); 
		$RaNInd = mysqli_real_escape_string($this->conn,$RaNInd); 
		$IAEng = mysqli_real_escape_string($this->conn,$IAEng); 
		$IAInd = mysqli_real_escape_string($this->conn,$IAInd); 
		$ICEng = mysqli_real_escape_string($this->conn,$ICEng); 
		$ICInd = mysqli_real_escape_string($this->conn,$ICInd); 
		$RMEng = mysqli_real_escape_string($this->conn,$RMEng); 
		$RMInd = mysqli_real_escape_string($this->conn,$RMInd); 
		$COCEng = mysqli_real_escape_string($this->conn,$COCEng); 
		$COCInd = mysqli_real_escape_string($this->conn,$COCInd); 
		$WhistleEng = mysqli_real_escape_string($this->conn,$WhistleEng); 
		$WhistleInd = mysqli_real_escape_string($this->conn,$WhistleInd); 
		$IaDEng = mysqli_real_escape_string($this->conn,$IaDEng); 
		$IaDInd = mysqli_real_escape_string($this->conn,$IaDInd); 
		$query="INSERT INTO gcg(OverviewEng, OverviewInd, RaNEng, RaNInd, IAEng, IAInd, ICEng, ICInd, RMEng, RMInd, created_date)ALUES ('$OverviewEng', '$OverviewInd', '$RaNEng', '$RaNInd', '$IAEng', '$IAInd', '$ICEng', '$ICInd', '$RMEng', '$RMInd', '$createddate')";
		$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
  		$last_id = mysqli_insert_id($this->conn);
		$query2="INSERT INTO gcg(ID_GCG, COCEng, COCInd, WhistleEng, WhistleInd, IaDEng, IaDInd, created_date) VALUES ('$last_id', '$COCEng', '$COCInd', '$WhistleEng', '$WhistleInd', '$IaDEng', '$IaDInd', '$createddate')";
		$result2 = mysqli_query($this->conn,$query2) or die(mysqli_connect_errno()."Data2 cannot inserted");
		return $result.$result2; 
	} 

	public function updateDataByUID($OverviewEng, $OverviewInd, $RaNEng, $RaNInd, $IAEng, $IAInd, $ICEng, $ICInd, $RMEng, $RMInd, $COCEng, $COCInd, $WhistleEng, $WhistleInd, $IaDEng, $IaDInd, $updatedate, $uID){ 
		$OverviewEng = mysqli_real_escape_string($this->conn,$OverviewEng); 
		$OverviewInd = mysqli_real_escape_string($this->conn,$OverviewInd); 
		$RaNEng = mysqli_real_escape_string($this->conn,$RaNEng); 
		$RaNInd = mysqli_real_escape_string($this->conn,$RaNInd); 
		$IAEng = mysqli_real_escape_string($this->conn,$IAEng); 
		$IAInd = mysqli_real_escape_string($this->conn,$IAInd); 
		$ICEng = mysqli_real_escape_string($this->conn,$ICEng); 
		$ICInd = mysqli_real_escape_string($this->conn,$ICInd); 
		$RMEng = mysqli_real_escape_string($this->conn,$RMEng); 
		$RMInd = mysqli_real_escape_string($this->conn,$RMInd); 
		$COCEng = mysqli_real_escape_string($this->conn,$COCEng); 
		$COCInd = mysqli_real_escape_string($this->conn,$COCInd); 
		$WhistleEng = mysqli_real_escape_string($this->conn,$WhistleEng); 
		$WhistleInd = mysqli_real_escape_string($this->conn,$WhistleInd); 
		$IaDEng = mysqli_real_escape_string($this->conn,$IaDEng); 
		$IaDInd = mysqli_real_escape_string($this->conn,$IaDInd); 
		$query = "UPDATE gcg SET OverviewEng = '$OverviewEng', OverviewInd = '$OverviewInd', RaNEng = '$RaNEng', RaNInd = '$RaNInd', IAEng = '$IAEng', IAInd = '$IAInd', ICEng = '$ICEng', ICInd = '$ICInd', RMEng = '$RMEng', RMInd = '$RMInd', update_date = '$updatedate' WHERE ID_GCG = '$uID'";
		$query2 = "UPDATE gcg2 SET COCEng = '$COCEng', COCInd = '$COCInd', WhistleEng = '$WhistleEng', WhistleInd = '$WhistleInd', IaDEng = '$IaDEng', IaDInd = '$IaDInd', update_date = '$updatedate' WHERE ID_GCG = '$uID'";
		$result = mysqli_query($this->conn,$query) or die(mysqli_error()."Data cannot inserted");
		$result2 = mysqli_query($this->conn,$query2) or die(mysqli_error()."Data2 cannot inserted");
		return $result.$result2; 
	} 

	public function deleteReport($deletedate, $IDReport){
		$query = "SELECT * FROM gcg WHERE ID_GCG='$IDReport'";
            //checking if the data is available in db
		$result = mysqli_query($this->conn,$query);
		$count_row = $result->num_rows;
		if ($count_row == 1){
			$query = "UPDATE gcg SET delete_date = '$deletedate' WHERE ID_GCG='$IDReport'";
			$query2 = "UPDATE gcg2 SET delete_date = '$deletedate' WHERE ID_GCG='$IDReport'";
			$result = mysqli_query($this->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
			$result2 = mysqli_query($this->conn,$query2) or die(mysqli_error()."Data2 cannot inserted");
			return $result.$result2; 
		}
		else { 
			return false;
		}
	}
}
?>


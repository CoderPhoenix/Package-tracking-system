<?php
function updateCost($new,$neighbour,$cost,$latitude,$longitude)
{
require"config.php";
$status=false;
  
   $query1  = $mysql_connect->query("SELECT * FROM distanceInfo WHERE node1='".$new."' and node2='".$neighbour."'");
 $row=$query1->fetch_array();
 $count = $query1->num_rows; 
 if($count==0)
 {
	   $query2=$mysql_connect->query("select * from location");
	   $arr=$query2->fetch_array();
       $rows=$query2->num_rows;
	   $query = "INSERT INTO location VALUES( " .($rows+1). ", '" .$new. "', " .$latitude. ", " . $longitude . ");";
        $query2=$mysql_connect->query("select id from location where node='".$neighbour."'");
		 $locrow=$query2->fetch_array();
		 $id=$locrow['id'];
		 $query3="INSERT INTO distanceInfo VALUES( " .($rows+1). ", '".$new."', " .$id. ",'" . $neighbour . "',".$cost.");";
       $query4="INSERT INTO distanceInfo VALUES( " .$id. ", '" .$neighbour. "', " .($rows+1). ",'".$new."',".$cost.");";
       $exec=$mysql_connect->query($query4);
	   if(!empty($mysql_connect->query($query))) {
	   $status=true;
              }
			  if (empty($mysql_connect->query($query3)))
			  { 
				  $status=false;
			  }	  
 }			  
        else  	
		{
			$query="update distanceInfo set cost=".$cost." where node1='".$new."' and node2='".$neighbour."'";
			//$query1="update distanceInfo set cost=".$cost." where node1='".$neighbour."' and node2='".$new."'";
			
			if(!empty($mysql_connect->query($query)))
				$status=true;
		} 	
	return $status;		
}
?>
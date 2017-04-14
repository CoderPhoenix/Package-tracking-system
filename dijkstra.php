<?php
session_start();
function shortestPath($a1,$b1)
{
  $_distArr = array();
  $_distArr1 = array();
  $server= 'localhost';
   $user='root';
   $pwd= '';
   $database='Amazon';
   $mysql_connect = new MySQLi($server,$user,$pwd,$database);
   $query= $mysql_connect->query("SELECT * FROM distanceInfo");
 //$row=$query->fetch_array();
   $count = $query->num_rows;
    if ($count > 0) {
    // output data of each row
    while($row = $query->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		if($a1==$row['node1'])
			$a=intval($row['id1']);
		//if($b1==$row['node2'])
			//$b=intval($row['id2']);
		         		
		$n1=intval($row['id1']);
		$n2=intval($row['id2']);
		$_distArr[$n1][$n2]=$row['cost'];
		
    }
} else {
    echo "0 results";
}
$query  = $mysql_connect->query("SELECT * FROM distanceInfo");
 if ($count > 0) {
    // output data of each row
    while($row = $query->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		if($b1==$row['node1'])
			$b=intval($row['id1']);
	}
 }	
$S = array();//the nearest path with its parent and weight
$Q = array();//the left nodes without the nearest path
foreach(array_keys($_distArr) as $val) $Q[$val] = 99999;
$Q[$a] = 0;

//start calculating
while(!empty($Q)){
    $min = array_search(min($Q), $Q);//the most min weight
    if($min == $b) break;
    foreach($_distArr[$min] as $key=>$val)
    	if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
           $Q[$key] = $Q[$min] + $val;
           $S[$key] = array($min, $Q[$key]);
    }
    unset($Q[$min]);
}

//list the path
$path = array();
$pos = $b;
while($pos != $a){
    $path[] = $pos;
    $pos = $S[$pos][0];
}
$path[] = $a;
$path = array_reverse($path);
//if($path==null)
	//return shortestPath($a1,$b1);
$cost=0;
for($i=0;$i<count($path);$i++)
	$cost+=$path[$i];
echo "<br><br>
	<div>
	<form method='post'>
	 <div class='' style='display:inline-block;text-align:center;background-color:limegreen;width:80%;margin-top:8px;margin-bottom:0px;padding:5px 2px 2px 2px'>
        <p style='font-size:25px'>The shipping cost is : ".$cost."</p>
     </div>
	 <button style='float:right;display:inline-block;width:20%;margin-top:8px;margin-bottom:0px;padding:16px' type='submit' class='btn btn-danger' id='submit' name='submit'>Submit Order</button>
     </form>
	 </div>";
	 $_SESSION['path']=$path[0];
	 for($o=1;$o<count($path);$o++)
	 { $_SESSION['path']=$_SESSION['path'].",";
       $_SESSION['path']=$_SESSION['path'].$path[$o];
	 }		 
    if(isset($_POST['submit']))
	{  echo '<script type="text/javascript">window.location.href="confirm.php"</script>';
	}
return $path;
}
?>
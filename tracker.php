<?php
require "config.php";
require "dijkstra.php";
$query = $mysql_connect->query("select * from tracker where pid='".$_SESSION['packageSession']."'");
$row=$query->fetch_array();			
$d= date('d/Y/m',$row['time']);
//echo "<script>alert('".$d."');</script>";
$path=$row['path'];
$myarr=explode(',',$path);
for($i=0;$i<count($myarr);$i++)
	echo(" ".$myarr[$i]);
$t=time();
$ordertime=$row['time'];
$diff=$t-$row['time'];
//echo $diff;
$arr=array();
for($i=1;$i<count($myarr);$i++)
{	$query=$mysql_connect->query("select cost from distanceInfo where node1='".$myarr[$i-1]."' and node2='".$myarr[$i]."'");
	$row=$query->fetch_array();
	$arr[$i-1]=$row['cost'];
	//echo "<script>alert('".$arr[$i-1]."');</script>";
}

$tot=60;
$arr1=array();
//echo "left".$myarr[0];
$i=0;
for(;$tot<$diff and $i<count($arr);$i++)
{
	$tot+=$arr[$i];
	$arr1[$i]=$ordertime;
	for($j=0;$j<=$i;$j++)
		$arr1[$i]+=60*$arr[$j];
	$tot+=60;
	//echo " left".$myarr[$i+1];
}
$width1=0;
$width2=0;
if($tot>60)
	$width1=30;
if($i==count($arr))
$width2=40;
echo'<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tracking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style> 
				.dropdown-menu dropdown-menu-right 
				{	
					
				}
				.well
				{
					padding:250px 200px 300px 200px;}
					
				.box1 {
    
						padding: 10px;
						margin-bottom: 5px; 
						text-align: justify;
						}

				.box2 {
			
						padding: 10px;
						text-align: justify;
			
						}
						
			</style>
<body>
<div class="w3-top">
			<nav class="navbar navbar-inverse w3-margin-0" style="margin:0px">
				<div class="container-fluid">
					<div class="navbar-header">
						<img src="assets/logo_size.png" class="w3-circle" style="width:50px" alt="logo">
					</div>
					<ul class="nav navbar-nav">
						<li><a href="#">ACMS007</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Electronics</a></li>
								<li><a href="#">Apparel</a></li>
								<li><a href="#">Books</a></li>
								<li><a href="#">Jewellery</a>
							</ul>
						</li>
						<li><a href="#">Donate</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="trackmodal.php">Track</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="userlogout.php">Logout <span class="glyphicon glyphicon-log-out" style="padding-left:3px"></span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<div class="input-group" style="width:400px;padding-top:8px">
						<input type="text" class="form-control" placeholder="Search">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit" style="height:34px">
								<i class="glyphicon glyphicon-search"></i>
								</button>
							</div>
						</div>
					</ul>
				</div>
			</nav>
		</div>
<br><br><br><br>

<div class="container">
  <h2>Order Tracking</h2>
  <div class=progress>
    <div class=progress-bar progress-bar-success role=progressbar style=width:30%>
      Shipped
    </div>
    <div class=progress-bar progress-bar-warning role=progressbar style=width:'.$width1.'%>
      In Transit
    </div>
    <div class=progress-bar progress-bar-danger role=progressbar style=width:'.$width2.'%>
      Out for delivery
    </div>
  </div>
</div>
<div class="w3-container w3-display-middle" style="width:800px">
  <h2>Delivery Information</h2>
 

  <table class="w3-table-all">
    <thead>
      <tr class="w3-light-grey">
        <th>Date</th>
        <th>Time</th>
        <th>Place</th>
      </tr>
    </thead>
    ';
	//echo ''.$myarr[0];
	for($j=0;$j<count($arr1);$j++)
	{  //echo 'hi';
		echo'
    <tr>  <td>'.date('d/Y/m',$arr1[$j]).'</td>
      <td>'.date('H:i:s',$arr1[$j]+19800).' </td>
      <td>Arrived at '.$myarr[$j+1].'</td>
    </tr>';
	}	
     echo'</table>
</div>


</body>
</html>
';
?>


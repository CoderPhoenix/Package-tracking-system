<?php
require "config.php";
session_start();
$temp=$_SESSION['path'];
$patharr1=array();
$patharr2=array();
$patharr1=explode(',',$temp);

for($i=0;$i<count($patharr1);$i++)
{
	$query=$mysql_connect->query("select node from location where id=".$patharr1[$i]);
	$row=$query->fetch_array();
	$patharr2[$i]=$row['node'];
//	echo "<br>".$patharr2[$i];
}
$_SESSION['nodepath']=$patharr2[0];
for($i=1;$i<count($patharr2);$i++)
{
	$_SESSION['nodepath']=$_SESSION['nodepath'].",";
	$_SESSION['nodepath']=$_SESSION['nodepath'].$patharr2[$i];
}
 //echo $_SESSION['nodepath'];
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$length=7;
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
		 $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
//echo $randomString." <br> ";
$query = "INSERT INTO tracker VALUES( '".$randomString."','".$_SESSION['nodepath']."',".time().");"; 
       if(!empty($mysql_connect->query($query))) {
	   $message = "<script>alert('Your order has been placed Package id: ".$randomString."');</script>";
	   }
        else			
		{
			$message="<script>alert('Problem in placing order!')</script>";	
		} 	
		   echo $message;
        echo '<script type="text/javascript">window.location.href="SourceDestDetails.php"</script>';		   
?>
<!DOCTYPE html>
  <html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <title>Simple Polylines</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0px;
        padding: 0px;
      }
    </style>
  </head>
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
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out" style="padding-left:3px"></span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<div class="input-group" style="width:400px;padding-top:8px">
						<input type="text" class="form-control" placeholder="Search">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
								</button>
							</div>
						</div>
					</ul>
				</div>
			</nav>
		</div>
		<?php
		require "dijkstra.php";
		require "config.php";
		$nodes=array();
		$lat=array();
		$lng=array();
		$lat1=array();
		$lng1=array();
		$nodes1=array();
		if(@$_GET['method']==0)
		{	
		$nodes=shortestPath(strtolower(trim(@$_GET['source'])),strtolower(trim(@$_GET['destination'])));
		}
		else if(@$_GET['method']==1)
		{
			
			$query  = $mysql_connect->query("SELECT * FROM location where node='".@$_GET['source']."'");
			$count=$query->num_rows;
			if($count==1)
			$row=$query->fetch_array();
			$nodes[0]=$row['id'];
			$query  = $mysql_connect->query("SELECT * FROM location where node='".@$_GET['destination']."'");
			$row=$query->fetch_array();
			$count=$query->num_rows;
			if($count==1)
			$nodes[1]=$row['id'];
			echo "<br><br>
	<div>
	  <form method='post'>
	 <div class='' style='display:inline-block;text-align:center;background-color:limegreen;width:80%;margin-top:8px;margin-bottom:0px;padding:5px 2px 2px 2px'>
        <p style='font-size:25px'>The shipping cost is : Rs.200</p>
     </div>
     <button style='float:right;display:inline-block;width:20%;margin-top:8px;margin-bottom:0px;padding:16px' type='submit' class='btn btn-danger' id='submit' name='submit'>Submit Order</button>
     </form>
	 </div>";
		}	
		
 $query  = $mysql_connect->query("SELECT * FROM location order by id asc ");
 
 $count = $query->num_rows;
 
 if ($count > 0) {
	 $i=0;
    
    while($row = $query->fetch_assoc()) {
        $nodes1[$i]=$row['id'];
		$lat1[$i]=$row['lat'];
		$lng1[$i]=$row['lng'];
		$i++;
    }
	
	for($j=0;$j<count($nodes);$j++)
	{
		for($k=0;$k<count($nodes1);$k++)
		{
			if($nodes[$j]==$nodes1[$k])
			{
				$lat[$j]=$lat1[$k];
				$lng[$j]=$lng1[$k];
                
				}
		}
	}
		
 }
    echo "
    <div id='map'></div>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: {lat: 28.704100 , lng: 77.102500},
          mapTypeId: 'terrain'
        });
		
		var flightPlanCoordinates = [";
		 for($j=0;$j<count($lat)-1;$j++)
          echo"{lat: ".$lat[$j].", lng:".$lng[$j]."},";
          
	  echo"{lat:".$lat[count($lat)-1].",lng:".$lng[count($lat)-1]."}];
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
      }
    </script>
    <script async defer
    src=https://maps.googleapis.com/maps/api/js?key=AIzaSyAouyysD5n4FdzBWDI07MkXiXhh651XgcA&callback=initMap>
    </script>
  </body>
</html>";
    if(isset($_POST['submit']))
	{  echo '<script type="text/javascript">window.location.href="confirm.php"</script>';
	}
?>
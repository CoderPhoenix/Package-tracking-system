<!DOCTYPE html>
<html>
	<head>
		<title>
			Delivery Details
		</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
					
		<style>
					
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
	</head>
	<body>
	
		<div class="w3-top">
			<nav class="navbar navbar-inverse w3-margin-0" style="margin:0px">
				<div class="container-fluid">
					<div class="navbar-header">
						<img src="assets/img_logo.jpg" class="w3-circle" style="width:50px" alt="logo">
					</div>
					<ul class="nav navbar-nav">
						<li><a href="#">ACMS007</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Electronics</a></li>
								<li><a href="#">Apparel</a></li>
								<li><a href="#">Books</a></li>
								<li><a href='#'>Jewellery</a>
							</ul>
						</li>
						<li><a href="#">Donate</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#Costs" data-toggle="modal" data-target="#Costs">Costs</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="adminlogout.php">Logout <span class="glyphicon glyphicon-log-out" style="padding-left:3px"></span></a></li>
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
         
		<div class="w3-display-container">
		<img src="assets/map_manvi.jpg" alt="Maps" style="width:100%">
		<div class=" container-fluid">
		<div class="col-md-12 w3-display-left ">
			 	
			<div class="col-md-6 w3-display-left">
			<div class="w3-padding ">
				<center>
				<div class= "panel panel-default" >
					<div class = "panel-heading">
						<center><p>Enter the new node and neighbouring nodes</p></center>
					</div>
   
  
	              <div class = "panel-body">
						
		               <form method=post>
						<div class=" box2 input-group col-xs-8">
							<span class="input-group-addon">New Node</span>
							<input id="new" type="text" class="form-control" name="new" placeholder="New Node "><br>
						</div>
					</div>
					<div>
                        
                        <div class=" box2 input-group col-xs-8">						
							<span class="input-group-addon">Neighbouring Node</span>
							<input id="neighbour" type="text" class="form-control" name="neighbour" placeholder="Neighbouring Node "><br>
						</div>
                        <div class=" box2 input-group col-xs-8">						
                            <span class="input-group-addon">Cost</span>
							<input id="cost" type="text" class="form-control" name="cost" placeholder="Cost">
                        </div>
                        <div class=" box2 input-group col-xs-8">						
                            <span class="input-group-addon">Latitude</span>
							<input id="latitude" type="text" class="form-control" name="latitude" placeholder="Latitude">
                        </div>											
					<div class=" box2 input-group col-xs-8">						
                            <span class="input-group-addon">Longitude</span>
							<input id="longitude" type="text" class="form-control" name="longitude" placeholder="Longitude">
                        </div>											
											
					<button type="submit" class="btn btn-danger" name=update id=update>Update Now</button>
					</form><br>
					<form method=post>	
				<button type="submit" name=submit id=submit class="btn btn-success">View Map</button>
				</form>
			
					</div>
				<?php
			if(isset($_POST['update']))
			 {
					 echo"<script>alert('Updated');</script>";
				require"updateNodes.php";
				$status=updateCost($_POST['new'],$_POST['neighbour'],$_POST['cost'],$_POST['latitude'],$_POST['longitude']);
				if($status==true)
					echo"<h3>Updated successfully!!</h3>";
				else
					echo"<h3>Couldn't update</h3>";
			 }
			 ?>
			<br><br><br><br><br><br>
			
			</center>
			</div>
				
			
			</div>
			
				
			</div>
			
			
			
		</div>
		<div class="col-md-6 w3-display-right">
			
			<?php
             if(isset($_POST['submit']))
			 {  echo "<br><br><br><br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
			echo"<iframe src='adminMap.php' width=800 height=1000 style='border:none'>
						
				
					</iframe>";
			 }
			 
				?>
				
				
				</div>
				
		</div>
		</div>
		<div class="modal fade" id="Costs" role="dialog">
<div class="modal-dialog">
			
<div class="modal-content">
				
<div class="modal-body">
					
<button type="button" class="close" data-dismiss="modal">&times;</button>
					
<?php 
	include("costsDisplay.php");
?>
				
</div>
			
</div>
		
</div>	
	
</div>
		
	</body>

</html>
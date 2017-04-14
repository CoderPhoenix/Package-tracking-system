<!DOCTYPE html>
<html>
	<head>
		<title>Delivery Details</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
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
								<li><a href='#'>Jewellery</a>
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
			
			<div class="col-md-6 w3-display-middle">
			<div class="w3-padding ">
				<center>
				<div class= "panel panel-default" >
					<div class = "panel-heading">
						<center><p>Enter the source and destination</p></center>
					</div>
  
	              <div class = "panel-body">
					 <form method=post>
						<div class=" box2 input-group col-xs-8">
							<span class="input-group-addon">Source</span>
							<input id="source" type="text" class="form-control" name="source" placeholder="Source">
						</div>
                        <div class=" box2 input-group col-xs-8">						
							<span class="input-group-addon">Destination</span>
							<input id="dest" type="text" class="form-control" name="dest" placeholder="Destination">
						</div>
                        <div class="btn-group radio">
			                 <select name="method" id="method">
                               <option value="0">Regular</option>
                               <option value="1">Prime</option>
                             </select>
					    </div>										
					
	                	<button type="submit" class="btn btn-danger" id="submit" name='submit'>Submit</button>
					</form>
					</div>
				</div>
			</center>
			</div>		
			</div>
		</div>
		</div>
	</body>
</html>
<?php

if(isset($_POST['submit']))
{
	$source=$_POST['source'];
	$destination=$_POST['dest'];
	$method=$_POST['method'];
	header("location:userMap.php?&source=".$source."&destination=".$destination."&method=".$method);
}

?>
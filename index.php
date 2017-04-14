<!DOCTYPE html>
<html lang="en">
<head>
  <title>Navigation Bar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
   <div class="w3-top">
   <nav class="navbar navbar-inverse w3-margin-0">
    <div class="container-fluid">
	  <div class="navbar-header">
	       <img src="assets/logo_size.png" class="w3-circle" style="width:50px" alt="logo">
	  </div>
	  <ul class="nav navbar-nav">
          <li class="active"><a href="#">ACMS007</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Electronics</a></li>
          <li><a href="#">Apparel</a></li>
          <li><a href="#">Books</a></li>
          <li><a href='#'>Jewellery</a>
        </ul>
      </li>
          <li><a class="w3-btn href="#">Donate</a></li>
          <li><a class="w3-btn href="#">Customer Service</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in" style="padding-right:3px"></span>Login <span class="caret"></span></a>
           <ul class="dropdown-menu">
              <li><a href="userLogin.php">User</a></li>
              <li><a href="adminLogin.php">Employee</a></li>
           </ul>
         </li>
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
   <img src="assets/map_manvi.jpg" alt="background" style="width:100%;padding-top:0px">
   </body>
</html>
		 
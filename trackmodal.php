<!DOCTYPE html>
<html>
<title>TrackModal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
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
	  <ul class="nav navbar-nav w3-disabled">
          <li class="active"><a href="#">ACMS007</a></li>
          <li class="dropdown w3-disabled"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Electronics</a></li>
          <li><a href="#">Apparel</a></li>
          <li><a href="#">Books</a></li>
          <li><a href='#'>Jewellery</a>
        </ul>
      </li>
          <li><a class="w3-btn w3-light-grey w3-text-red w3-disabled href="#">Donate</a></li>
          <li><a class="w3-btn w3-light-grey w3-text-red w3-disabled href="#">Customer Service</a></li>
		  <li><a class="w3-btn w3-light-grey w3-text-red w3-disabled href="#">Track</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right w3-disabled">
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in" style="padding-right:3px"></span>Login <span class="caret"></span></a>
           <ul class="dropdown-menu">
              <li><a class="w3-disabled" href="#">User</a></li>
              <li><a class="w3-disabled" href="#">Employee</a></li>
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

   <div class="w3-container w3-display-middle" id="id01">
   <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:350px">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
        <img src="assets/img_logo.jpg" alt="Logo" style="width:30%" class="w3-circle w3-margin-top">
      </div>
      <form class="w3-container" method="post">
        <div class="w3-section">
          <label class="w3-margin-left"><b>Package id</b></label>
          <input class="w3-input w3-border w3-margin-left w3-margin-bottom" type="text" style="width:300px" placeholder="Enter Package id" name="pid" required>
          <div style="display:none" id="error msg" class="w3-panel w3-margin-left w3-margin-right w3-red">
           <h5>Invalid Username and Password!!</h5>
          </div> 
		  <button class="w3-btn-block w3-green w3-margin-left w3-section w3-padding" name="trackSubmit" style="width:300px" type="submit">Track</button>
        </div>
      </form>
    </div>
 </div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
<?php
session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['trackSubmit'])) {
   require("config.php");
   //echo ''.$_POST['pid'];
   $query  = $mysql_connect->query("SELECT pid FROM tracker WHERE pid='".trim($_POST['pid'])."'");
   $row=$query->fetch_array();
   $count = $query->num_rows; // if email/password are correct returns must be 1 row
   if ($count==1) {
	 $_SESSION['packageSession'] = $row['pid'];
     echo '<script type="text/javascript">window.location.href="tracker.php"</script>';
   } else {
    echo "<script>document.getElementById('error msg').style.display='block';</script>";
}
}
}   
?>

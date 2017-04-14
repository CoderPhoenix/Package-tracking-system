<?php
require "config.php";
$query  = $mysql_connect->query("SELECT * FROM location ");
 //$row=$query->fetch_array();
 $count = $query->num_rows;
 $lat=array();
 $lng=array();
 $nodes=array();
 if ($count > 0) {
	 $i=0;
    // output data of each row
    while($row = $query->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			$lat[$i]=$row['lat'];
			$lng[$i]=$row['lng'];
			$nodes[$i]=$row['node'];
			$i++;
		
    }
 }	
 echo"<!DOCTYPE html>
<html>

<body>

<div id=map style=width:100%;height:500px;padding:0px;margin:0px</div>

<script>
function myMap() {
  
  var mapCanvas = document.getElementById('map');
  var mapOptions = {
		  //center: myCenter, zoom: 5};
		  mapTypeId: 'roadmap'
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var bounds = new google.maps.LatLngBounds();
  map.setTilt(45);
  var markers = [";
  for($j=0;$j<count($lat)-1;$j++)
  {
	  echo"['".$nodes[$j]."',".$lat[$j].",".$lng[$j]."],";
  }     
    echo"['".$nodes[$j]."',".$lat[$j].",".$lng[$j]."]];";
                        
         
    // Display multiple markers on a map
    echo"var  marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        map.fitBounds(bounds);
    }
    
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(5);
        google.maps.event.removeListener(boundsListener);
    });
    
    }
   </script>

<script async defer
    src=https://maps.googleapis.com/maps/api/js?key=AIzaSyAouyysD5n4FdzBWDI07MkXiXhh651XgcA&callback=myMap>
    </script>
</body>
</html>
   ";

?>
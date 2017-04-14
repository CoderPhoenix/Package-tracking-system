<style>


// Modal
.modaloverlay{
  background:rgba(0,0,0,0.8);
  bottom:0;
  left:0;
  opacity:0;
  pointer-events:none;
  position:fixed;
  right:0;
  top:0;
  -webkit-transition: opacity 400ms ease-in;
  -moz-transition: opacity 400ms ease-in;
  transition: opacity 400ms ease-in;
  z-index:-1;
  display: none;
  &:target{
    display: block;
    opacity:1;
    pointer-events:auto;
    z-index:99999;
  }
  .modal{
    background-color:white;
    height: 100%;
    position:relative;
    margin:0 auto;
    padding:3em;
    overflow-y: scroll;
    -webkit-overflow-scrolling: touch;
    @media (min-width: 60em) {
      height:75%;
  	 margin:5% auto;
  	 max-height: 57em;
      max-width:66em;
      width:85%;
  	}
	> iframe, > div{
		border:none;
		width:100%;
		height:100%;
    }
  }
  .close{
    background-color:turquoise;
    color:white;
    font-size:24px;
    padding:8px 12px;
    position:absolute;
    right:0;
    text-align:center;
    text-decoration:none;
    top:0;
    z-index: 1;
  }
}

</style>
<div class="modal-header">
      <h2 class="text-center"> Costs table </h2>
	</div>
  
<div class="Costs">	
   <div class="Costs">	
	   <table class="table">
		<thead>
		  <tr>
			<th>Sort center1</th>
			<th>Sort center2</th>
			<th>Cost</th>
		  </tr>
		</thead>
	</thead>
</div>	
		<tbody>
		<?php         
		   require "config.php";
			$query = "select distinct node1,node2,cost from distanceInfo order by node1 asc";
			if($query_run = mysqli_query($mysql_connect, $query)) {
				$rows = mysqli_num_rows($query_run);
				if($rows > 0) {
					for($i=0;$i<$rows;$i++){
						$query_row = mysqli_fetch_assoc($query_run);
						$node1 = $query_row['node1'];
						$node2 = $query_row['node2'];
						$cost=$query_row['cost'];

						echo '<tr>
								<th>'.ucfirst($node1).'</th>
								<th>'.ucfirst($node2). '</th>
								<th>'.ucfirst($cost). '</th>
							</tr>';
					      }
					
						
						}
					}
					
				
			
	    ?>
		</tbody>
	  </table>
	</div>
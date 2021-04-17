<?php

$server="localhost";
$user= "bh74qj";
$password = "Uos@3232";
$db ="admin_101_14a";

 $con = new mysqli($server,$user,$password,$db);

 if($con){
 	?>
 		<script >
 			alert("connection Successful");
 		</script>
 	<?php
 }

 ?>
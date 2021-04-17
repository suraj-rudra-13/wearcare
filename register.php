<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register as a patient</title>
</head>
<body>
    
<h1>WearCare</h1>
<?php
if ($_POST)
{
    include "dbconnect.php";

    //TODO
    //save POST values
    	$firstname = $_POST['firstname'];
 		$surname = $_POST['surname'];
 		$email =  $_POST['email'];
 		$user_password = $_POST['user_password'];
 		$tel =  $_POST['tel'];
 		$house  = $_POST['house'];
		$street  = $_POST['street'];
		$town  = $_POST['town'];
 		$postcode = $_POST['postcode'];
 		$dob =$_POST['dob'];
 		$practice =$_POST['practice'];
    
       
		//building a new connection object
        // set the PDO error mode to exception
		$server="localhost";
		$user= "bh74qj";
		$password = "Uos@3232";
		$db ="admin_101_14a";

 		$conn = new mysqli($server,$user,$password,$db);

        //TODO
        // prepare sql and bind parameters
   	 $stmt= $conn->prepare("insert into patients(firstname, surname, email, user_password, tel, house, street, town, postcode, dob, practice)
	 values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssssss",$firstname, $surname, $email, $user_password, $tel, $house, $street, $town , $postcode, $dob, $practice);	
		$stmt->execute();
		echo "Well done - you have now registered as a WearCare patient";
		$stmt->close();
		$conn->close();
}

?>
</body>
</html>
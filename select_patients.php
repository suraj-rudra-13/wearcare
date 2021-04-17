<?php
session_start(); // important function to allow session variables  

if ($_SESSION["loggedIn"] != "admin") {

    header("Location: login_form.html"); //send them to the form to login

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>View patients</title>

</head>

<body>
    <h1>WearCare</h1>
    <p>Viewing all of the registered patients</p>
    <hr>
	<table border="2">
		<tr>
    		<td>Sr.No.</td>
    		<td>First Name</td>
    		<td>Last Name</td>
			<td>Email</td>
    		<td>Password</td>
    		<td>Telephone</td>
			<td>House</td>
    		<td>Street</td>
    		<td>Town</td>
			<td>Post Code</td>
    		<td>DOB</td>
    		<td>Practice</td>
    		<td>Edit</td>
    		<td>Delete</td>
  		</tr>
    <?php
        
       include "dbconnect.php";
        
        try {
            $server="localhost";
			$user= "bh74qj";
			$password = "Uos@3232";
			$db ="admin_101_14a";

 			$conn = new mysqli($server,$user,$password,$db);
            //Selecting multiple rows from a MySQL database using the PDO::query function.
            $records = mysqli_query($db,"select * from patients");
            
            //For each result that we return, loop through the result and perform the echo statements.
            //$row is an array with the fields for each record returned from the SELECT
                while($data = mysqli_fetch_array($records))
				{
					
				?><tr>
    		<td><?php echo $data['id']; ?></td>
    		<td><?php echo $data['firstname']; ?></td>
    		<td><?php echo $data['surname']; ?></td>
			<td<?php echo $data['email']; ?></td>
    		<td><?php echo $data['user_password']; ?></td>
    		<td><?php echo $data['tel']; ?></td>
			<td><?php echo $data['house']; ?></td>
    		<td><?php echo $data['street']; ?></td>
    		<td><?php echo $data['town']; ?></td>
			<td><?php echo $data['postcode']; ?></td>
    		<td><?php echo $data['dob']; ?></td>
    		<td><?php echo $data['practice']; ?></td>
    		<td>echo '<a href="update_patient.php?patient_id='.$row['id'].'" class="button">Update this patient</a><br>';</td>
    		<td> echo '<a href="delete_patient.php?patient_id='.$row['id'].'" class="dbutton" onclick="return confirm(\'Are you sure you want to delete this patient?\');">Delete this patient</a>';</td>
  				</tr>
                   
            }
		mysqli_close($conn);
        ?>

	</table>
</body>
</html>
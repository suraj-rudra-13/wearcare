<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <?php
        
        include "dbconnect.php";
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
                $userEmail = $_POST['userEmail'];
                $userPassword = $_POST['userPassword'];
                
           
                //TODO
                //Write query to search for user in the users table

                $sql -> execute(); //execute the statement
                //$sql -> debugDumpParams(); useful to see the query

                if($sql->rowCount()) { //check if we have results by counting rows
                    
                    
                        //TODO
                        //set session variables
                        //redirect the user to admin.php
                    
                }    

                else
                    {
                        echo 'Wrong username or password'; //message to display if the search returned no results
                    }
                
                }
            catch(PDOException $e)
                {
                echo $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
                }
        }
        else{
            echo "You're here by mistake" ;
        }
        ?>


</body>
</html>
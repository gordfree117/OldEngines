<?php 
session_start();

        if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        require("db.php");
        
        $query = "SELECT password, userID FROM users WHERE username='$username'";
        
        $result = $db->query($query);
        
            if ($result->num_rows == 1) { //if the query finds a username
                $row = $result->fetch_assoc();
                $hash = $row["password"] ;
                
                if(password_verify($password, $hash)){ // if the hashed passwords match the given username
                    $_SESSION["username"] = $username;
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["userID"] = $row["userID"];
                    header("location: index.php");
                }
                else {
               $_SESSION["incorrect"] = true;
               header("location: login.php");
                }
            }
            else{
            $_SESSION["incorrect"] = true;
            header("location: login.php");
            }
        
        
        }   
        else {
        //Kick user back to index page if they didn't get here by way of Login page
        header("location: login.php");
        }


$db->close();


?>
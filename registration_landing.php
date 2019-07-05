<?php 
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Engines</title>

  <!-- Bootstrap CSS -->  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    
    <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript Bundle (w/ popper.js  -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="style.css">
    
    <script> 
$(function(){
  $("#navbar").load("navbar.php");
  $("#footer").load("footer.php");   
  
});
</script>
</head>
<body>
    <div id="navbar"></div>
    <?php 

require("db.php");

$username = filter_input(INPUT_POST,"username");
$password = filter_input(INPUT_POST,"password");
$hashpass = password_hash($password, PASSWORD_DEFAULT);
$Phone1 = filter_input(INPUT_POST, "Phone1")
$email = filter_input(INPUT_POST,"email");
$FName = filter_input(INPUT_POST,"firstname");
$LName = filter_input(INPUT_POST,"lastname");
    

    
//Prepared Statements 

// verify information is unique (username, email)
    // CONVERT THIS INTO PREPARED STATEMENT
    
$query = "SELECT userID FROM users WHERE username='$username'";
$result = $db->query($query);
    if ($result->num_rows > 0) {
        $fail = true;
        $_SESSION['UNregInval'] = 1;
        header("location: registration_page.php");
    } else {
        $fail = false;
    }


//Enter user info into database
                             
$stmt2 = $db->prepare("INSERT INTO users (username, password, email, FName, LName, Phone1) VALUES (?,?,?,?,?,?)"); 
    
$stmt2->bind_param("ssssss", $username, $hashpass, $email, $FName, $LName, $Phone1 );
  
if ($fail == false){
    if ($stmt2->execute() == false){
        echo "Problem Registering! Please Contact Webmaster!";
    }
    else {
        echo "You are successfully registered! You may now login.";
        header("location: index.php");
    }
} else {
}
?>
    <div id="footer"></div>
</body>
</html>
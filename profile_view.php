<?php 
session_start();
if ($_SESSION["loggedIn"] == false){
    header("location: index.php");
}
require('db.php');
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
$query = "SELECT * from users WHERE userID='$userID'";
$result = $db->query($query);
$row = $result->fetch_assoc();
$email = $row['email'];
$FName = $row['FName'];
$LName = $row['FName'];
$dateJoined = $row['dateJoined'];
$query = "SELECT COUNT(*) as 'count' FROM engines WHERE userID = $userID";
$result = $db->query($query);
$row = $result->fetch_assoc();
$count = $row['count'];


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
    <h2><?php echo $username;?></h2>
    Number of posts: <br>
    <a href="user_posts.php">
    <?php 
        echo $count;
    ?></a>
    
    
    
    
    
<div id="footer"></div>
</body>
</html>    
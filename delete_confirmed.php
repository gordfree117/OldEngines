<?php 
session_start();
require('db.php');
if ($_SESSION["loggedIn"] == false){
    header("location: index.php");
}
$itemID = htmlspecialchars($_GET["itemID"]);

$query = "DELETE FROM engines WHERE engineID='$itemID'";


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
    <style>
        
</style>
</head>
<body>
<div id="navbar"></div>
    
    <h3><?php
     
        if ($db->query($query)){
            echo "Item Successfully Deleted! Thank you for using OldEngines.com!";
        } else {
            echo "Error deleting item! Please contact Webmaster!";
        }
    
    ?></h3>
   <h2>Item deleted.</h2>     
        
        
        
<div id="footer"></div>
</body>
</html>
<?php 
session_start();
require('db.php');
if ($_SESSION["loggedIn"] == false){
    header("location: index.php");
}
$itemID = htmlspecialchars($_GET["itemID"]);

$query = "SELECT * from engines WHERE engineID='$itemID'";

$db->query($query);
$result1 = $db->query($query);
$row = $result1->fetch_assoc();

$itemID = $row['engineID'];
$uploaderID = $row['userID'];
$title = $row['title'];
$price = $row['Price'];
$Description = $row['description'];
$imagePath = $row['imagePath'];
$city = $row['city'];
$state = $row['state'];
$zipCode = $row['zipCode'];
$location = "$city, $state $zipCode";
$weight = $row['weight'];
$volume = $row['volume'];
$horsepower = $row['horsepower'];
$torque = $row['torque'];
$dateListed = $row['dateListed'];
$OEM = $row['OEM'];
$fuelType = $row['fuelType'];
$cylinderConfig = $row['cylinderConfig'];
$mileage = $row['mileage'];
$modelNumber = $row['modelNumber'];
$manufacturer = $row['manufacturer'];
$year = $row['year'];
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
        <h2> Delete listing "<?php echo $title ?>"</h2>
        <div id="main">
            <h1>Are you sure?</h1>
            <button onclick="window.location.href = 'delete_confirmed.php?itemID=<?php echo $itemID ?>';">Yes</button>
            <button onclick="window.location.href = 'user_posts.php';" id='No'>No</button>
        </div>
        
    <div id="footer"></div>
    </body>
</html>
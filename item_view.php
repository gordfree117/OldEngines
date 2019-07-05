<?php 
session_start(); 
 require("db.php");
$itemID = htmlspecialchars($_GET["itemID"]);
$query = "SELECT * from engines WHERE engineID='$itemID'";
$result1 = $db->query($query);
$row = $result1->fetch_assoc();

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

$query = "SELECT username, email, Phone1 from users WHERE userID='$uploaderID'";
$result = $db->query($query);
$row = $result->fetch_assoc();
$email = $row['email'];
$uploader = $row['username'];
$Phone1 = $row['Phone1'];


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
        .column{
            float:left;
            padding: 10px;
            
        }
        #left_panel{
            width: 30%;
            background-color:beige;
            padding: 10px;
            border-style: outset;
        }
        #main_panel{
           width: 50%; 
           
        }
        
        #jerk {
            max-width: 90%;
            height: auto;
            margin: auto;
        }
        #description p{
        border-style: inset;
        }
        
        #right_panel{
            width: 20%;
            background-color:beige;
            border-style: outset;
        }
        .related_item {
            border-style: solid;
            margin-top: 10px;
            padding: 5px;
            margin-left: 40px;
            margin-right: 40px;
            margin-bottom: 30px;
        }
        .related_item img {
            width: 50px;
            height: auto;
            margin-top: 5px;    
        }
 
        

        
        /* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */

        
        
    .collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
    display: none;
        
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
        @media screen and (max-width: 1200px){
            #relatedContent {
                display: none;
            }
        }
        
        @media screen and (max-width: 600px) {
  #left_panel, #main_panel, #right_panel {
    width: 100%;
  }
    .collapsible{
        display:block;
    }
    #DetailsList{
         display: none;       
    }
    
}
    </style>
    

    
</head>
    
<body>

<div id="navbar"></div>
    <div class="row">  
        <div class="column" id="left_panel">
            <div id="DetailsDropdown">
            <button class="collapsible">Details</button>
            <div class="content">
                <p>Sold from: <?php echo $location; ?></p>
            <p><?php echo "Manufacturer: $manufacturer $year";?></p>
            <?php //start populating optional tags
                if ($modelNumber != FALSE){
                  echo "<p>Model Number: $modelNumber</p>";  
                }
            if ($cylinderConfig != FALSE){
                  echo "<p>Cylinder Configuration: $cylinderConfig</p>";  
                }
                if ($mileage != FALSE){
                  echo "<p>Mileage: $mileage mi</p>";  
                }
            if ($fuelType != FALSE){
                  echo "<p>Fuel Type: $fuelType</p>";  
                }
            if ($weight != FALSE){
                  echo "<p>Engine Weight: $weight lbs</p>";  
                }
            if ($torque != FALSE){
                  echo "<p>Output Torque: $torque </p>";  
                }
             if ($horsepower != FALSE){
                  echo "<p>Horsepower: $horsepower horses </p>";  
                }
             if ($OEM == true){
                  echo "100% OEM parts";  
                }
                
            
            ?>
            </div>
            </div>
            <div id="DetailsList">
            <h6>Details</h6>
            <p>Sold from: <?php echo $location; ?></p>
            <p><?php echo "Manufacturer: $manufacturer $year";?></p>
            <?php //start populating optional tags
                if ($modelNumber != FALSE){
                  echo "<p>Model Number: $modelNumber</p>";  
                }
            if ($cylinderConfig != FALSE){
                  echo "<p>Cylinder Configuration: $cylinderConfig</p>";  
                }
                if ($mileage != FALSE){
                  echo "<p>Mileage: $mileage mi</p>";  
                }
            if ($fuelType != FALSE){
                  echo "<p>Fuel Type: $fuelType</p>";  
                }
            if ($weight != FALSE){
                  echo "<p>Engine Weight: $weight lbs</p>";  
                }
            if ($torque != FALSE){
                  echo "<p>Output Torque: $torque </p>";  
                }
             if ($horsepower != FALSE){
                  echo "<p>Horsepower: $horsepower horses </p>";  
                }
             if ($OEM == true){
                  echo "100% OEM parts";  
                }
                
            
            ?>
        </div>
        </div>
        <div class="column container" id="main_panel">
            <div class="row">
            <div class="col-sm-12 col-md-6">
                    <img id="jerk" src="<?php echo $imagePath; ?>">
                </div>
                <div class="col-sm-12 col-md-6">
                    <br>
                    <h6><?php echo $title;?></h6>
                    <p>$<?php echo $price;?></p>
                    <p>Posted by <?php echo $uploader." on ".$dateListed;?></p>
                    <p><?php echo "$Phone1 OR $email"; ?></p>
                
                </div>
             </div>
            <div class="row">
             <div id="description" class="col-sm-12">
                 <br>
                <p><?php echo $Description;?></p>
             </div>
             </div>
        </div>
            

        <div class="column" id="right_panel">
            <div id="relatedContent">
            Related Items:<br><br>
            <?php 
                $num = 5;
                $uploaderID = "welder57";
                
                for ($i = 1; $i < $num; $i++){
                    $title = "Item$i";
                    echo "
                        <div class='related_item'>
                            <img src='images/icon.png'>
                            <h6>$title</h6>
                            <p>by $uploaderID</p>
                        </div>
                    ";
                    
                }
            ?>
        
         
        </div>
        </div>
    </div>
    
    
    <?php 
    $db->close();
    ?>
    
    
<div id="footer"></div>
<script>
    var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}</script>
</body></html>
<?php 
session_start();
if ($_SESSION["loggedIn"] == false){
    header("location: index.php");
} ?>
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
    <?php 
    
      function compress_image($source_url, $destination_url, $quality) {

       $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg')
              $image = imagecreatefromjpeg($source_url);

        elseif ($info['mime'] == 'image/gif')
              $image = imagecreatefromgif($source_url);

      elseif ($info['mime'] == 'image/png')
              $image = imagecreatefrompng($source_url);

        imagejpeg($image, $destination_url, $quality);
    return $destination_url;
    }
    ?>
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
    
    $userID = $_SESSION['userID'];//REPLACE WITH USER ID
    $title = $_POST['title'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $manufacturer = $_POST['manufacturer'];
    if ($manufacturer == 'Chevvy'){
        $manufacturer = 'Chevrolet';
    }
    $modelNumber = str_replace(' ', '', $_POST['modelNumber']);
    $modelNumber = str_replace('-', '', $modelNumber);
    $modelNumber = preg_replace('/[^A-Za-z0-9\-]/', '', $modelNumber);
    $category = $_POST['category'];
    $volume = $_POST['volume'];
    $weight = $_POST['weight'];
    $mileage = $_POST['mileage'];
    $cylinderConfig = $_POST['cylinderConfig'];
    $torque = $_POST['torque'];
    $horsepower = $_POST['horsepower'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    $fuelType = $_POST['fuelType'];
    $OEM = $_POST['OEM'];
    $price = $_POST['price'];
    $thumbDest = '';
    
    if (isset($_FILES["raw_image"])){
        $target_dir = "uploads/" . $_SESSION['username'];
    if (file_exists($target_dir) == false){
    mkdir($target_dir, 0700);
    }
  
    // Count files in directory and increment, then name the file
    
    $target_file = $target_dir . basename($_FILES["raw_image"]["name"]);
    $filecount = (count(scandir($target_dir)) - 2);
    $ext = pathinfo($target_file, PATHINFO_EXTENSION);
    
    $pathA = $target_dir.'/'.$filecount;
    $target_file = $pathA.'.'.$ext;
        

    $uploadOk = 1;
    
    //Check to see if file is an image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["raw_image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }


    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your image was not uploaded.";
// if everything is ok, try to upload file
} else if ($uploadOk == 1) {
    //echo "Upload is OK";
    if (move_uploaded_file($_FILES["raw_image"]["tmp_name"], $target_file)) {
        //echo "Image uploaded.";
        $thumbDest = $pathA . 'thumb.jpg';
        $imagePathThumb = compress_image($target_file, $thumbDest, 75);

    } else {
        echo "Sorry, there was an error uploading your image. <br>";
    }
}
        
    } else {
        echo "you didn't try to upload a picture!";
        $target_file = "null";
        $uploadOK = 2;
    }
    
    
    
    
    require("db.php");
    
    //Parse OEM value
    if ($OEM == "Yes"){
        $OEM = 2;
    } else if($OEM == "No") {
        $OEM = 1;
    } else {
        $OEM = 0;
    }
    

    
    // Prepared Statements
$stmt = $db->prepare("INSERT INTO engines (title, description, year, manufacturer, modelNumber, volume, weight, mileage, cylinderConfig, torque, horsepower, city, state, zipCode, fuelType, OEM, Price, userID, category, imagePath, imagePathThumb) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
    
$stmt->bind_param("ssissssisssssssidisss", $title, $description, $year, $manufacturer, $modelNumber, $volume, $weight, $mileage, $cylinderConfig, $torque, $horsepower, $city, $state, $zipCode, $fuelType, $OEM, $price, $userID, $category, $target_file, $thumbDest);

if ($uploadOk == 1){
if ($stmt->execute() == false){
        echo "Problem Posting! Please Contact Webmaster!";
    }
    else {
        echo "Item successfully posted!";
        $query = "SELECT engineID FROM engines WHERE title='$title'";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        $itemID = $row['engineID'];
        header("location: item_view.php?itemID=$itemID");
    }
        
   
    } else {
        "Item not posted. Image failed to upload.";
    } 
    
    ?>

    <div id="footer"></div>
    
</body>
</html>
<?php 
session_start();
require('db.php');
if ($_SESSION["loggedIn"] == false){
    header("location: index.php");
}

$query = "SELECT engineID, title, imagePath, dateListed, Price from engines WHERE userID='".$_SESSION['userID']."'";
$db->query($query);

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
    <style>
        .button {
            max-width: 50px;
            height: auto;
            float: left;
            border-radius: 20%;
            border-style: inset;   
        }
       
    </style>
    <script> 
$(function(){
  $("#navbar").load("navbar.php");
  $("#footer").load("footer.php");   
  
});
</script>
<style>
    
    .column {
  float: left;
  padding: 10px;

}
    
.column.left {
  width: 25%;
    background-color:beige;
}
.column.middle {
  width: 75%;
    padding-right: 20px;
}
    .row:after {
  content: "";
  display: table;
  clear: both;
}
    @media screen and (max-width: 600px) {
  .column.left, .column.middle {
    width: 100%;
  }
}
.list_item{
    width: 100%;
  border-style: solid;
  border-width: medium; 
    border-radius: 5px;
    text-align: left;
    padding: 5px;
    margin-bottom:15px;
    
}
        .list_item:hover{
            background-color: #dbd9d8;
        }
    
    .list_item img {
        margin-left: 10px;
        height: 40px;
        width: auto;
    }
    .list_item .item_title{
        margin-left: 10px;
    }
    
    .list_item .price {
        float: right;
        margin-right:5px;
    }
    .list_item .posted_by{
        margin:10px;
    }
</style>
    
</head>
    
<body>
    	<div id="navbar"></div>
    <div class="row">
        <div class="column left"></div>
    <div class="column middle">
    <h2>Your Posted Items</h2>
        <?php
        $result = $db->query($query);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
  
            $image_location = $row['imagePath'];
            $item_title = $row['title'];
            $price = $row['Price'];
            $itemID = $row["engineID"];
            
            //use userID to get username
                                 
            echo "<a href='delete_item.php?itemID=$itemID'><img class='button' src='images/trash.jpg'</a><a href='item_view.php?itemID=$itemID'><div class='list_item'>
            <img class='item_thumbnail' src=$image_location>
            <strong class='item_title'>$item_title</strong>
                <span class='posted_by'>posted ".$row['dateListed']."</span>
                <span class='price'>$$price</span></div></a>";
        }     
    } else {
        echo "You have no currently listed items.";
    }
    ?>
    
     </div>   
   
    </div>
    
    <div id="footer"></div>
    
    
</body>
</html>
<?php 
session_start();
require ('db.php');


$cat = '';
$flag='';

//start query
$query = "SELECT * from engines WHERE ";

//add category search to query
if ($_POST['category_dropdown'] != '--Select--'){
    $cat = $_POST['category_dropdown'];
    $query = $query . "category='$cat' ";
    $flag = 1;
}

//add manufacturer search to query
if ($_POST['manufacturer'] != ''){
    if ($_POST['category_dropdown'] != '--Select--'){
        $query = $query . "AND ";
    }
    $manu = $_POST['manufacturer'];
    $query = $query . "manufacturer='$manu' ";
    $flag = 1;
} 

//add search term to query
if ($_POST['search_box'] != ''){
    $search_term = $_POST['search_box'];
    if ($flag == 1){
    $query = $query . "AND ";
    }
    $query = $query . "Match(title) Against('$search_term')";
} else { //bounce user back to search page if they submitted with no search term
    header("location: index.php"); 
}
echo $query;

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
#left, #right {
    background-color:beige;
    border-style: outset;
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
  <div id='left' class="col-md-2">
    
  </div>
  
  <div class="col-md-8">
      <h4>Results for blank</h4>

    <!-- PHP script to generate multiple divs with fetched content -->
      <?php 
        $result = $db->query($query);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            
            $itemID = $row['engineID'];
            $imageThumb = $row['imagePathThumb'];
            $item_title = $row['title'];
            $posted_by = $row['userID'];
            $price = $row['Price'];
            
            if ($cat != ''){
                if ($row['category'] == $cat){
                    echo "<a href='item_view.php?itemID=".$itemID."'><div class='list_item'><img class='item_thumbnail' src=".
                $imageThumb.
                "><strong class='item_title'>".
                $item_title.
                "</strong><span class='posted_by'>posted by: ".
                $posted_by.
                "</span><span class='price'>".
                $price.
                "</span></div></a>"; 
                }
                
            } 
            else {                
           echo "<a href='item_view.php?itemID=".$itemID."'><div class='list_item'><img class='item_thumbnail' src=".
                $imageThumb.
                "><strong class='item_title'>".
                $item_title.
                "</strong><span class='posted_by'>posted by: ".
                $posted_by.
                "</span><span class='price'>".
                $price.
                "</span></div></a>"; 
            }
        }
    }
      ?>
      
      
      
    </div>
    <div id="right" class="col-md-2"></div>
</div>
    
    
    <div id="footer"></div>
</body>
</html>
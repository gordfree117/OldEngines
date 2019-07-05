<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Engines</title>

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
    
    
        
        /* Style the button that is used to open and close the collapsible content */
.collapsible {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .collapsible:hover {
  background-color: #ccc;
}

/* Style the collapsible content. Note: hidden by default */
.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>
</head>
<body>
    <div id="navbar"></div>
    <div class="row">
  <div id="left" class="col-md-2">
    <!-- <h6>Filter Results</h6>
      
      
    <button class="collapsible">Open Collapsible</button>
<div class="content">
  <p>Lorem ipsum...</p> -->
</div>
      
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
}
</script>
  
  <div class="col-md-8">
      <?php $category = htmlspecialchars($_GET["category"]); ?>
      <h4>Results under Category "<?php echo $category; ?>"</h4>
    <!-- PHP script to generate multiple divs with fetched content -->
    
<?php
    require("db.php");  
    
//echo $category;
    $query = "SELECT engineID, title, userID, Price, imagePath FROM engines WHERE category='$category'";
    $result = $db->query($query);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
  
            $image_location = $row['imagePath'];
            $item_title = $row['title'];
            $postingUserID = $row['userID'];
            $price = $row['Price'];
            $itemID = $row["engineID"];
            
            //use userID to get username
            $query2 = "SELECT username from users WHERE userID='$postingUserID'";
            $result2 = $db->query($query2);
            $row2 = $result2->fetch_assoc();
                                 
            echo "<a href='item_view.php?itemID=$itemID'><div class='list_item'>
            <img class='item_thumbnail' src=$image_location>
            <strong class='item_title'>$item_title</strong>
                <span class='posted_by'>posted by: ".$row2['username']."</span>
                <span class='price'>$$price</span></div></a>";
        }     
    } else {
        echo "Well, we're still small. That category is empty.";
    }
?>
 </div>
<div id='right' class="col-md-2"></div>
</div>
        
    
    
    <div id="footer"></div>
</body>
</html>
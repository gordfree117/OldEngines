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
    
    <style>
        #category_tile_other{
            max-width: 15%;
            margin-left:auto;
            margin-right:auto;
        }
    </style>
    <script> 
$(function(){
  $("#navbar").load("navbar.php");
  $("#footer").load("footer.php");   
});
</script>
</head>
<body>
<div id="navbar"></div>
<div class="jumbotron">
    <h2>OldEngines.com</h2>
    <p>Wecome to OldEngines.com! The name says it all! Feel free to browse or search, or register an account to put an old engine, part, or accessory up for sale!</p>
</div>
<br>
<div class="row">
    <div class="col-sm-1 col-lg-1"></div>
    <form action="search_landing.php" class="col-sm-10 col-xs-12 col-lg-3" method="POST" role="form">   
    <div class="form-group">
        <label for='search_box'><h2>Search Here</h2></label>
        <input type="text" class="form-control" name="search_box" placeholder="Item Keywords or Model Number">
    </div>
    <br>
    <div class="form-group">
        <label for="category_dropdown"><h3>Category</h3></label>
    <select class="form-control" name="category_dropdown">
        <option>--Select--</option>
      <option>Boats</option>   
      <option>Cars</option>
      <option>Trucks</option>
      <option>Lawn Mowers</option>
      <option>Handheld Appliances</option>
      <option>Aircraft</option>
      <option>Other</option>
    </select>
  </div>
        <br>
        <div class="form-group">
        <label for="manufacturer"><h3>Manufacturer</h3></label>
        <input type="text" class="form-control" name="manufacturer" placeholder='(Jeep, Toyota, Honda, etc.)'></div>
        <br>
        <div id="button">
    <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <br> 
       </form>
    <div class="col-lg-8">
    <h2>...or Browse by Category</h2>
<div id="grid_categories" class="container">
  <div  id="" class="row">
      <div class="col-sm category_tile"><a href="browse_landing.php?category=Cars"><div><br>
        <img class="category_icon" src="images/car.jpg">
        <br><br>
      Cars
        <br></div></a>
    </div>
        <div class="col-sm category_tile"><a href="browse_landing.php?category=Trucks"><div><br>
        <img class="category_icon" src="images/truck.jpg">
            <br>
            Trucks
            <br>
            <br></div></a>
    </div>
      <div class="col-sm category_tile">
          <a href="browse_landing.php?category=Boats"><div><br>
        <img class="category_icon" src="images/boat.jpg">
        <br><br>
      Boats
              <br><br></div></a>
    </div>
  </div>
    
      <div  id="" class="row">
    <div class="col-sm category_tile"><a href="browse_landing.php?category=Handheld Appliances"><div>
        <br><img class="category_icon" src="images/weed.jpg">
        <br>
      Handheld Appliances
        <br>
        <br></div></a>
    </div>
    <div class="col-sm category_tile"><a href="browse_landing.php?category=Lawn Mowers">
       <br> <img class="category_icon" src="images/mower.jpg">
        <br>
      Lawn Mowers
        <br></a>
    </div>
    <div class="col-sm category_tile"><a href="browse_landing.php?category=Aircraft"><div><br>
        <img class="category_icon" class="category_icon" src="images/plane.jpg">
        <br><br>
        Aircraft
        <br></div></a>
    </div>
    <br>
    </div>
    <div id="category_tile_other"><a href="browse_landing.php?category=Other">
        <h3>Other</h3></a>
    </div>
    <br>
    </div>
    </div>
</div>
<div id="footer"></div>  
</body>
</html>
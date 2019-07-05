<?php 
session_start();
if ($_SESSION["loggedIn"] == false){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Post an Item for sale!</title>

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
    #submit_div {
        margin-top: 20px;
    }
    #redForm, #yellowForm, #blueForm {
        
    }
    #redForm {
        border-style: inset;
        border-radius: 10px;
        border-color: red;
        background-color: #ffeaea;
    }
    #yellowForm {
        border-style: inset;
        border-radius: 10px;
        background-color: #fff2c9;
        border-color: yellow;
    }
    #blueForm {
        border-style: inset;
        border-radius: 10px;
        border-color: blue;
        background-color: #c1e1ff;
    }
    .button {
        font-size: 20pt;
        background-color: #88d1ff;
        border-radius: 10px;
    }
    form {
        text-align: left;            
    }
    #submit_div {
        text-align: center;
    }
    .margin {
        background-color: beige;
    }
    
@media only screen and (max-width: 768px) {
  form {
    text-align: center;
      padding-left: 10px;
  }
}
</style>
    
<script>
function validate(){
        var box1 = document.getElementById("title_field");
        if (box1.value == ""){              document.getElementById("title_field").style.backgroundColor="#ffcccc";
        alert("The title field must be filled out.");
        return false;
            } else {    document.getElementById("title_field").style.backgroundColor="white";
            } 
        box1 = document.getElementById("manufacturer_field");
        if (box1.value == ""){
            document.getElementById("manufacturer_field").style.backgroundColor="#ffcccc";
        alert("The manufacturer field must be filled out.");
        return false;
            } else {    document.getElementById("manufacturer_field").style.backgroundColor="white";
        }
    
    box1 = document.getElementById("year_select_field");
        if (box1.value == ""){
            document.getElementById("year_select_field").style.backgroundColor="#ffcccc";
        alert("The Year field must be filled out.");
        return false;
            } else {    document.getElementById("year_select_field").style.backgroundColor="white";
        }
    box1 = document.getElementById("category_select_field");
        if (box1.value == ""){
            document.getElementById("category_select_field").style.backgroundColor="#ffcccc";
        alert("The category field must be filled out.");
        return false;
            } else {    document.getElementById("category_select_field").style.backgroundColor="white";
        }
    box1 = document.getElementById("price_field");
        if (box1.value == ""){
            document.getElementById("price_field").style.backgroundColor="#ffcccc";
        alert("The price field must be filled out.");
        return false;
            } else {    document.getElementById("price_field").style.backgroundColor="white";
        }
    
        box1 = document.getElementById("city_field");
    if (box1.value == ""){
            document.getElementById("city_field").style.backgroundColor="#ffcccc";
        alert("The city field must be filled out.");
        return false;
            } else {    document.getElementById("city_field").style.backgroundColor="white";
        }
    
    box1 = document.getElementById("state_select_field");
    if (box1.value == ""){
            document.getElementById("state_select_field").style.backgroundColor="#ffcccc";
        alert("The state field must be filled out.");
        return false;
            } else {    document.getElementById("state_select_field").style.backgroundColor="white";
        }
    box1 = document.getElementById("zip_field");
    if (box1.value == ""){
            document.getElementById("zip_field").style.backgroundColor="#ffcccc";
        alert("The zip code field must be filled out.");
        return false;
            } else {    document.getElementById("zip_field").style.backgroundColor="white";
        }
    
    
}
</script>
</head> 
<body>	
<div id="navbar"></div>
<br>
<h2>New Engine Posting</h2>
<br>
<div class="row">
<div class="margin col-md-1"></div>
    
<div class="col-md-10">
<form method="post" role="form" action="posting_landing.php" enctype="multipart/form-data" onSubmit="return validate();">
<div class="row">
    <div id="redForm" class="col-md-6 col-lg-3">    <h4>Required Information</h4>
                <div id="title" class="form-group">
        <label for="title"> Engine Name (Required. This will be the title of your posting)</label>
        <input id="title_field" type="text" class="form-control" name="title">
    </div>
        
                <div id="manufacturer" class="form-group">
      <label for="manufacturer">Manufacturer (Required)</label>
  <input id="manufacturer_field" type="text" class="form-control" name="manufacturer" placeholder="(Jeep, Toyota, Husqavarna, etc.)">
    </div>
    
                <div id="year" class="form-group" id="year_sel">
      <label for="year">Year (Required)</label>
    <select class="form-control" name="year" id="year_select_field">
        <?php
        echo "<option></option>";
        for ($i = 2019; $i > 1900; $i--){
            echo "<option>$i</option>";
        }
        ?>
    </select>
  </div>
    
                <div id="category" class="form-group" id="cat_sel">
      <label for="category">Select Category. (This greatly helps people find your item!)</label>
    <select class="form-control" name="category" id="category_select_field">
            <option></option>
        <option>Cars</option>   
      <option>Trucks</option>
      <option>Boats</option>
      <option>Aircraft</option>
      <option>Lawn Mowers</option>
      <option>Handheld Appliances</option>
        <option>Other</option>
    </select>
  </div>
    
                
    <div id="price" class="form-group">  
                <label for="price">Price (required)</label>
                $<input id="price_field" type="text" class="form-control" name="price" value="">
                </div>
                
            </div> 
    <div id="yellowForm" class="col-md-6 col-lg-3">
                <h4>Strongly Recommended Information</h4>
                <h5> Ships from:</h5>
                <div class="form-group form-inline">
                    <label for="city" class="sr-only">City</label>
                    <input id="city_field" type="text" class="form-control" name="city" placeholder="City">
                    <label for="state" class="sr-only">State</label>
                    <select class="form-control" name="state" id="state_select_field">
                        <option></option>
                    <option>AL</option>
                        <option>AK</option>
                        <option>AZ</option>
                        <option>AR</option>
                        <option>CA</option>
                        <option>CO</option>
                        <option>CT</option>
                        <option>DE</option>
                        <option>FL</option>
                        <option>GA</option>
                        <option>HI</option>
                        <option>ID</option>
                        <option>IL</option>
                        <option>IN</option>
                        <option>IA</option>
                        <option>KS</option>
                        <option>KY</option>
                        <option>LA</option>
                        <option>ME</option>
                        <option>MD</option>
                        <option>MA</option>
                        <option>MI</option>
                        <option>MN</option>
                        <option>MS</option>
                        <option>MO</option>
                        <option>MT</option>
                        <option>NE</option>
                        <option>NV</option>
                        <option>NH</option>
                        <option>NJ</option>
                        <option>NM</option>
                        <option>NY</option>
                        <option>NC</option>
                        <option>ND</option>
                        <option>OH</option>
                        <option>OK</option>
                        <option>OR</option>
                        <option>PA</option>
                        <option>RI</option>
                        <option>SC</option>
                        <option>SD</option>
                        <option>TN</option>
                        <option>TX</option>
                        <option>UT</option>
                        <option>VT</option>
                        <option>VA</option>
                        <option>WA</option>
                        <option>WV</option>
                        <option>WI</option>
                        <option>WY</option>
                    </select>
                    <label for="zipCode" class="sr-only">Zip Code</label>
                    <input id="zip_field" type="text" class="form-control" name="zipCode" placeholder="Zip Code">
                </div>
                <div id="description" class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
                </div>     
                
                <div id="modelNumber" class="form-group">
        <label for="modelNumber">Model Number:</label>
    <input type="text" class="form-control" name="modelNumber" value="">
    </div>
    
                <div id="raw_image" class="form-group">
                <label for="raw_image">Image: (not required)</label><br>
                <input type="file" name="raw_image" id="raw_image">
                </div>
            </div>
    <div id='blueForm' class='col-md-6 col-lg-3'>      <h4>Optional Information</h4>
    <div class="form-group">
        <label for="weight">Weight</label>
        <input class="form-control" type="text" name="weight">Lbs
    </div>
    <div class="form-group">
        <label for="volume">Volume</label>
        <input class="form-control" type="text" name="volume" value="">L
    </div>
    <div class="form-group">
        <label for="mileage">Mileage</label>
        <input class="form-control" type="text" name="mileage" value="">mi
    </div>
    <div class="form-group">
        <label for="cylinderConfig">Cylinder Configuration (v6, v8, etc)</label>
        <input class="form-control" type="text" name="cylinderConfig">
    </div>
    </div> 
    <div id='blueForm' class="col-md-6 col-lg-3">
        <br><br>
    <div class="form-group">
        <label for="torque">Torque</label>
        <input class="form-control" type="text" name="torque">
        </div>
    <div class="form-group">
        <label for="horsepower">Horsepower</label>
        <input class="form-control" type="text" name="horsepower">horses
    </div>
        <div class="form-group">
            <label for="OEM">All OEM parts?</label>
            <select class="form-control" name="OEM" id="OEM_select_field"> 
                <option></option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
    
    <div class="form-group" id="fuel_sel">
      <label for="fueltype">Select Fuel Type.</label>
    <select class="form-group form-control" name="fuelType" id="fuel_select_field">
        <option></option>
        <option>Gasoline</option>
    <option>Premium Gasoline</option>
      <option>Diesel</option>
      <option>E85</option>
      <option>Ethanol</option>
        <option>Jet Fuel</option>
    </select>
  </div>
     </div> 
    <div id="submit_div" class="col-lg-12">
            <button class="button" type="submit" class="btn btn-default">Submit</button>
    </div>
</div>        
</form>
</div>
    
<div class="margin col-md-1"></div>
</div>
    <br>
<div id="footer">
        <br>
        <p>Copyright 2019 OldEngines.com</p>
        <br>
    </div>
    
</body>
</html>
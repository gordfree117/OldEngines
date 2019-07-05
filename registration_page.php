<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

  <!-- Bootstrap CSS -->  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    
    <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript Bundle (w/ popper.js  -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="style.css">
    <style>
        .button {
        font-size: 20pt;
        background-color: #88d1ff;
        border-radius: 10px;
            margin-top: 30px;
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
@media only screen and (max-width: 600px) {
  form {
    text-align: center;
  }
}
    </style>
    <script> 
$(function(){
  $("#navbar").load("navbar.php");
  $("#footer").load("footer.php");   
  
});
</script>
    <script>
        function validate(){
            var box1 = document.getElementById("username_field");
            if (box1.value == ""){                                   document.getElementById("username_field").style.backgroundColor="#ffcccc"; 
                return false;
            } else {    document.getElementById("username_field").style.backgroundColor="white";
            }
            
           box1 = document.getElementById("email_field");
            if (box1.value == ""){                                   document.getElementById("email_field").style.backgroundColor="#ffcccc"; 
                return false;
            } else {    document.getElementById("email_field").style.backgroundColor="white";
            }
            
            box1 = document.getElementById("password_field");
            if (box1.value == ""){                                   document.getElementById("password_field").style.backgroundColor="#ffcccc"; 
                return false;
            } else {    document.getElementById("password_field").style.backgroundColor="white";
            }
            
            box1 = document.getElementById("conf_field");
            if (box1.value == ""){                                   document.getElementById("conf_field").style.backgroundColor="#ffcccc"; 
                return false;
            } else {    document.getElementById("conf_field").style.backgroundColor="white";
            }
            
            box1 = document.getElementById("conf_field");
            var box2 = document.getElementById("password_field");
            if (box1.value != box2.value){
                document.getElementById("conf_field").style.backgroundColor="#ffcccc"; 
                return false;
            } else {
                document.getElementById("conf_field").style.backgroundColor="white";
            }
            
        }
    </script>
    
</head>
    
<body>
<div id="navbar"></div>
    
       
    
    <div class="row">
        <div class="margin col-md-2"></div>
        <div class="col-md-8">
            <br>
            
            <h3> Register an Account on OldEngines.com</h3>
        <form action="registration_landing.php" role="form" method="POST" onSubmit="return validate();">
            <br>
            <div class="row">
                <div class="col-md-6">
                    
            <div class="form-group">
            <label for="username">Enter a Username (Required):</label>
                <?php
                    if(isset($_SESSION['UNregInval'])){
                    echo "<input id='username_field' type='text' class='form-control is-invalid' name='username'><span style='color:red'>That username already exists.</span>";
                    unset($_SESSION['UNregInval']);
                    } else {
                    echo "<input id='username_field' type='text' class='form-control' name='username' placeholder='username'>";
                    }
                ?>
            </div>
                    
            <div class='form-group'>
                <label for="email">Enter your email (Required):</label>
            <input id='email_field' type="text" class="form-control" name="email" placeholder="example@website.com">
                
            </div>
            <div class='form-group'>
                <label for="password">Choose a password (Required):</label>
                <input id='password_field' type="password" class="form-control" name="password" placeholder="password">
                 
                
            </div>
        <div class="form-group">
            <label for="conf_password">Confirm password (Required):</label>
                <input id='conf_field' type="password" class="form-control" name="conf_password" placeholder="confirm password">
            
        </div>
        </div>
                <div class="col-md-6">
        <div class="form-group">
           
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" name="firstname" value="">
            </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" name="lastname" value="">
            
            </div>
        <div class="form-group">
            <label for="phone1">Primary Phone:</label>
            <input type="text" class="form-control" name="Phone1" value="">
            </div>
        <div class="form-group">
            <label for="phone2">Phone 2:</label>
            <input type="text" class="form-control" name="phone2"></div>
            <div class="form-group">
                <label for='phone3'>Phone 3:</label>
        <input type="text" class="form-control" name="phone3">
                </div>            
        </div>
            </div>
            <div class="row">
        <br><br>
        <div id="submit_div" class="col-md-12">
            <button class="button" type="submit" class="btn btn-default">Submit</button>
        </div>
            </div>
            </form>
    </div>
    <div class="margin col-md-2"></div>
        </div>
        

        <br>
<div id="footer"></div>
</body>
</html>
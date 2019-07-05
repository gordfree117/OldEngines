<?php 
session_start();

if (isset($_SESSION['incorrect'])){
    $derp = true;//idk, I just need this if/else block to execute. 
} else{
    $_SESSION['incorrect'] = false;
}
?>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
</head>
<body>
    <div id="navbar"></div>
    <h1>Login</h1>
    <?php 
    if($_SESSION['incorrect'] == true) {
        echo"invalid username or password.";
    }
    ?>
    <form action="validate.php" method="POST" class="container"><br>
        Enter your Username:
        <input type="text" class="form-control" name="username" placeholder="username"><br>
        Enter your password:
        <input type="password" class="form-control" name="password" placeholder="password"><br>
        
        <input type="submit" value="Login" name="login">
        
    </form>
 
    
    <div id="footer"></div>
</body>
</html>
<?php 
session_start();

?>
<div class="navbar navbar-default navbar-light bg-success">
        
        <a href="index.php" class="navbar-brand"><img id="icon" src="images/icon.png"><span>Old Engines</span></a>
    <?php 
        if(isset($_SESSION["username"])){
            echo 
                "<strong>Welcome, ".$_SESSION['username']."</strong><br><br>";
            
            echo "<ul class='nav navbar-bar'>
            
            <div style='background-color:beige;' class='nav-link'>   
			     <a href='profile_view.php'><strong>View Profile</strong> <br> </a>
            </div>

            <div style='background-color:beige;' class='nav-link'>   
			     <a href='logout.php'><strong>Log Out</strong> <br> </a>
            </div>
            
            <div style='background-color:beige;' class='nav-link'>   
			     <a href='posting_form.php'><strong>Post Item</strong> <br> </a>
            </div>
            ";
        }
        else {
            echo "
            <ul class='nav navbar-bar'>

            
            <div style='background-color:beige;' class='nav-link'>   
			     <a href='login.php'><strong>Log In</strong> <br> </a>
            </div> 
            <br>
            
            <div style='background-color:beige;' class='nav-link'>
                <a href='registration_page.php'> <strong>Register</strong> <br> </a>
            </div>
            
		  </ul>
                ";
        }
    ?>
		
	</div>

<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'dbconnect.php';   
    
    $username = $_POST["email"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpass"];
            
    
    $sql = "SELECT * from covid_sys.users where username='$username'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num == 0) {
        if(($password == $cpassword) && $exists==false) {
    
            $hash = password_hash($password, 
                                PASSWORD_DEFAULT);
                
            // Password Hashing is used here. 
            $sql = "INSERT INTO `users` ( `username`, 
                `password`, `date`) VALUES ('$username', 
                '$hash', current_timestamp())";
    
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $showAlert = true; 
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="Username not available"; 
   } 
    
}//end if   
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width,
						initial-scale=1.0">
	<title>LOG IN</title>
	<link rel="stylesheet"
		href="css/login.css">
</head>

<body>
    
    <?php
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
     ?>
   
    
    
	<header>
		<form  action="userloginconn.php" method = "POST">
		<h1 class="heading">LOG IN AND SIGN UP</h1>
		<h3 class="title">covid-19 vac. mgt. sys. login & signup</h3>
	</header>

	<!-- container div -->
	<div class="container">

		<!-- upper button section to select
			the login or signup form -->
		<div class="slider"></div>
		<div class="btn">
			<button class="login">Login</button>
			<button class="signup">Signup</button>
		</div>

		<!-- Form section that contains the
			login and the signup form -->
		<div class="form-section">

			<!-- login form -->
			<div class="login-box">
				<input type="email"
					class="email ele" name="username"
					placeholder="youremail@email.com" required>
				<input type="password" name="password"
					class="password ele"
					placeholder="password" required>
					<ul class="nav-links">
                <li><a href="index.php">
				<button  type="submit" class="clkbtn">Login</button></a>
			
			</li></ul></form>

			</div>
            <form method="post" action="">
			<!-- signup form -->
			<div class="signup-box">
				<input type="text"
					class="name ele" name="name"
					placeholder="Enter your name">
				<input type="email"
					class="email ele" name="email"
					placeholder="youremail@email.com">
				<input type="password" name="password"
					class="password ele"
					placeholder="password">
				<input type="password"
					class="password ele" name="cpass"
					placeholder="Confirm password">
				<button href="index.php" class="clkbtn">Signup</button>
			</div>
		</div>
	</div>
</form>
	<script src="js/login.js"></script>
</body>

</html>

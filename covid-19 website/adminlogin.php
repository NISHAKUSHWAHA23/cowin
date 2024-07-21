<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet">

    <link rel="stylesheet" href="css/adminlogin.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
          <div class="col-left">
            <div class="login-text">
              <h2>Welcome Back</h2>
              <h3>Admin Login</h3>
              <p><br>covid-19 vaccination mgt sys</p>
              
            </div>
          </div>
          <div class="col-right">
            <div class="login-form">
              <h2>Login</h2>
              <form method="post" action="validate.php">
                <p>
                  <label>Username or email address<span>*</span></label>
                  <input type="text" name="username"  placeholder="Username or Email" required>
                </p>
                <p>
                  <label>Password<span>*</span></label>
                  <input type="password" name="password"  placeholder="Password" required>
                </p>
                <p>
                  <input type="submit" name="login" value="log In" />
                </p>
                <p>
                  <a href="">Forget Password?</a>
                </p>
              </form>
            </div>
          </div>
        </div>
        
      </div>
      
      
      
        
</body>
</html>
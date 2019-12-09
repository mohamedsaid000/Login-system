<?php
// Start the session
session_start();


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 


 //including config.php
 include 'config.php';
 
 if(isset($_POST['login'])){
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($link,$_POST['username']);
      $password = mysqli_real_escape_string($link,$_POST['password']); 
      
      
      //selecting the data in the database
      $sql = "SELECT id, username, password FROM usersinfo WHERE username='$username';";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //$passwordr and $usernamer they are equal to the real password and real username of the user
        $passwordr = $row['password'];
    }
    
    
    
    //checking if the password is correct
    if (password_verify($password, $passwordr)) {
    
      //everything looks good now the user is seccessfully login
      $_SESSION["loggedin"] = true;
      $_SESSION["username"] = $username;
      header("location: welcome.php");
    
    }
     else {
    $error = "The username or the password is Wrong!";
    
    }
    
    
    
    
    } // if 0 result
    else{
        
         echo "
             <div class='alert alert-primary' role='alert'>
              Nothing Found with that username 
              </div>
             ";
    }
      
     
 
 
 
 
 


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <title>Login</title>
    
    <!-- includeing the style file -->
    <link rel="stylesheet" href="style/style.css">
    
    <!-- includeing the javascript file -->
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div id="logreg-forms">
        <form class="form-signin" method="POST" >
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
            </div>
            <p style="text-align:center"> OR  </p>
            <input type="Username" id="inputEmail" name="username" class="form-control" placeholder="Username" required="" autofocus="">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required=""> <?php echo $error;  ?> </span>
            
            <button name="login" class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="forgotpassword/" id="forgot_pswd">Forgot password?</a>
            <hr>
            <a href="signup.php" <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up New Account</button></a>

            
                   
    </div>
    <p> by : Mohamed Said </p>
    <style>
        p{
                position: relative;
                text-align: center;
        }
    </style>
</body>
</html>
<?php 
 //including the connection of the mysql
 include 'config.php';
 
 


 //if button sign up is click do this
   if(isset($_POST['signupb'])){
       
       //input name="fname" is equal to $fname
       $fname = $_POST['fname'];
       
       //input name="lname" is equal to $lname
       $lname = $_POST['lname'];
       
       //input name="email" is equal to $email
       $email = $_POST['email'];
       
       //input name="username" is equal to $username
       $username = $_POST['username'];
       
       //input name="password" is equal to $passwor
       $password = $_POST['password'];
       
       //if username And password is less than 6 characters error
       if (strlen($_POST["password"]) <= '8' && strlen($_POST["password"]) <= '8'){
           //if username And password is less than 6 characters let the user know!
            $password_error= "Your Password Must Contain At Least 8 Characters!";
            $username_error= "Your Username Must Contain At Least 8 Characters!";
        }else{
            //if everything looks fine do this
            
            //change the password text to hash password
            $hashpass = password_hash($password, PASSWORD_DEFAULT);
            
            //checking if the username was already taken
            $sqlcheck = "SELECT * FROM usersinfo WHERE username='$username'";
            $result = mysqli_query($link, $sqlcheck);
            if (mysqli_num_rows($result) > 0) {
  	           
  	           $failed = "Sorry... username already taken";
             
             echo "
             <div class='alert alert-primary' role='alert'>
              $failed
              </div>
             ";
  	           
            } else {
            
            
            //if you use stmt your code will be more secure. So we will gonna use it
            
            // Prepare an insert statement
           $sql = "INSERT INTO usersinfo (fname, lname, email, username, password) VALUES (?, ?, ?, ?, ?)";
            
           if($stmt = mysqli_prepare($link, $sql)){
           // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $username, $hashpass);    
            
             mysqli_stmt_execute($stmt);
             
             $success = "Your account has been created successfully";
             
             echo "
             <div class='alert alert-primary' role='alert'>
              $success
              </div>
             ";
             
             
           } else{
                 echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
             }
 
            // Close statement
            mysqli_stmt_close($stmt);
            
            
            } // checking the username is already token!
            
            
        } //else less than 6 characters
        
     
     
     
     
       
       
       
       
       
       
       
       
       
       
       
       
   }
// else don't do anything!






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
    <title>Register page</title>
    
    <!-- includeing the style file -->
    <link rel="stylesheet" href="style/style.css">
    
    <!-- includeing the javascript file -->
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div id="logreg-forms">
        <form class="form-signin" method="POST" >
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign Up</h1>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
            </div>
            <p style="text-align:center"> OR  </p>
            
            
            <input type="text" name="fname" id="inputEmail" class="form-control" placeholder="Firstname" required="" autofocus="">
            <input type="text" name="lname" id="inputEmail" class="form-control" placeholder="Lastname" required="" autofocus="">
            
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
            
            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required="" autofocus=""> <span> <?php echo $username_error;  ?> </span>
            
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required=""> <span> <?php echo $password_error;  ?> </span>
            
            <button class="btn btn-success btn-block" name="signupb" type="submit"><i class="fas fa-sign-in-alt"></i> Create Account</button>
            
            
            <a href="#" id="forgot_pswd">Forgot password?</a>
            <hr>
            
           <a href="index.php" <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Login page</button>
            </form></a>
            
    </div>
    
</body>
</html>

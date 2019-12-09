<?php
// Start the session
session_start();


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    
    
}else{
    header("location: index.php");
    exit;
}
 
 //including config.php
 include 'config.php';
 
 //finding user username
 $username = $_SESSION["username"];
 


$sql = "SELECT * FROM usersinfo WHERE username='$username';";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $fname = $row["fname"]; 
        $lname = $row["lname"];
    }
}
    
    

  
 
 
?> 
 <h3>Hi Welcome, <?php echo $fname; echo "&nbsp;"; echo $lname; ?></h3>

<a href="logout.php">Logout</a>

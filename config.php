<?php
$servername = "localhost";
$username = "id11857291_test000";
$password = "password55";
$db = "id11857291_test";

// Create connection
$link = new mysqli($servername, $username, $password, $db);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

?>
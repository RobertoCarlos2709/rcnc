<?php
$servername = "192.168.56.1";
$username = "adminSD";
$password = "adminSD12345";
$dbname = "testdb";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();;
}


?>
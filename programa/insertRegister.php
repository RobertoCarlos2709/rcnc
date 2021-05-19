
<?php

include ('connect.php');

try {

  $nom=$_POST['firstname'];
  $ap=$_POST['lastname'];
  $email=$_POST['email'];

  $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('".$nom."','".$ap."','".$email."')";
  $conn->exec($sql);
  


  
}   catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

  $conn = null;
?>



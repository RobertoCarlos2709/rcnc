
<?php

include ('connect1.php');

try {

  $nom=$_POST['nombrep'];
  $mar=$_POST['marcap'];
  $cos=$_POST['costop'];

  $sql = "INSERT INTO productos (nombrep, marcap, costop) VALUES ('".$nom."','".$mar."','".$cos."')";
  $conn->exec($sql);
  


  
}   catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

  $conn = null;
?>



<?php

//action.php

include('dbconect1.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':nombrep'  => $_POST['nombrep'],
  ':marcap'  => $_POST['marcap'],
  ':costop'   => $_POST['costop'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE productos
 SET nombrep = :nombrep, 
 marcap = :marcap, 
 costop = :costop
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM productos
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>
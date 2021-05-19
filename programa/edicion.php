<?php

//action.php

include('dbconect.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':firstname'  => $_POST['firstname'],
  ':lastname'  => $_POST['lastname'],
  ':email'   => $_POST['email'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE myguests
 SET firstname = :firstname, 
 lastname = :lastname, 
 email = :email
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM myguests
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>
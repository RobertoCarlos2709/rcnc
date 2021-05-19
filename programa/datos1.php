<?php


include('dbconect1.php');

$column = array("id", "nombrep", "marcap", "costop");

$query = "SELECT * FROM productos ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE nombrep LIKE "%'.$_POST["search"]["value"].'%" 
 OR marcap LIKE "%'.$_POST["search"]["value"].'%" 
 OR costop LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id asc ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['nombrep'];
 $sub_array[] = $row['marcap'];
 $sub_array[] = $row['costop'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM productos";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>

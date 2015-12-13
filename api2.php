<?php 
require_once 'login.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  $query = "SELECT * FROM colombia_plaza_new";
  $result = $conn->query($query);
  $rows = array();

  $numrows = $result->num_rows;
while ($row = $result->fetch_assoc()){
 $rows[] = $row;}
/*
for ($j = 0 ; $j < $numrows ; ++$j)
{
  $result->data_seek($j);
  $row = $result->fetch_array(MYSQLI_NUM);
  $rows[]=$row;
  }
*/
  echo json_encode($rows);

?>

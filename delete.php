<?php

$id1 = $_GET['Item_id'];
 $id = $_POST['id'];
echo $id ;
 require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);

if (isset($_POST['id']) && intval($_POST['id']) > 0) {
	
	echo "1";
    // create PDO instance; assign it to $db variable
    $sql = "DELETE FROM `colombia_plaza_new` WHERE `request_id` = ' $id ' LIMIT 1";
    //$smt = $db->prepare($sql);
	
	
	$result   = $conn->query($sql);
	
	 if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
	  




$conn->close();  
	
    //$smt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    //$smt->execute();
}


if (isset($_GET['Item_id']) && intval($_GET['Item_id']) > 0) {
	
	echo "1";
    // create PDO instance; assign it to $db variable
    $sql = "DELETE FROM `colombia_plaza_new` WHERE `request_id` = ' $id1 ' LIMIT 1";
    //$smt = $db->prepare($sql);
	
	
	$result   = $conn->query($sql);
	
	 if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
	  




$conn->close();  
	
    //$smt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    //$smt->execute();
}

header('Location: register.php');

?>
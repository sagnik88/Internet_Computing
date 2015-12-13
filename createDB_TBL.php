
<?php
require_once 'login.php';  // Contains our mysql login credentials
echo "login params: hostname = " . $hn . "; username = " . $un . "; password = ******* " . "; db name = " .$db;

// Create connection

$conn = new mysqli($hn, $un, $pw);




// Check connection

 if ($conn->connect_error) {
     echo "<br/>";
     die("Die - Connection failed: " . $conn->connect_error);

}


// Create database

$sql = "CREATE DATABASE " . $db ;
echo "<br/>";
echo "Create db sql: " . $sql;
if ($conn->query($sql) === TRUE) {
     echo "<br/>";
     echo "Database created successfully";
}   else {
     echo "<br/>";
     die("Die - Create DB failed: " . $conn->error);
}


// Close connection then reopen with $db
$conn->close();
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
   echo "<br/>";
   die("Connection with db failed: " . $conn->connect_error);
}  else {
     echo "<br/>";
     echo "Connection with db: $db succeeded";
}

 
 
 $sql = "CREATE TABLE `colombia_plaza` (".
  "`request_id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,".
  "`lease owner` varchar(20) NOT NULL,".
  "`request_poster` varchar(20) NOT NULL,".
  "`email` varchar(20) NOT NULL,".
  "`address` varchar(20) NOT NULL,".
  "`start_date` date NOT NULL,".
  "`end_date` date NOT NULL,".
  "`expected_rent` int(11) DEFAULT NULL,".
  "`is_deposit` tinyint(1) DEFAULT NULL,".
  "`notes` varchar(20) DEFAULT NULL)";

echo "<br/>";
echo "sql for create table: " . $sql;

if ($conn->query($sql) === TRUE) {
    echo "<br/>";
    echo "Table created successfully";

} else {
    echo "<br/>";
    echo "Error creating table: " . $conn->error;

}




echo "<br/>";
echo "Connected successfully";

 ?>

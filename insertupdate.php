
<?php 
error_reporting(E_ALL);

ini_set('display_errors', 1);


$id111=$_GET["Item_id"];
 
 require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db);
  
 if ($conn->connect_error) die($conn->connect_error);
 
 
	
/* 
   $photo= addslashes($_FILES['photo']['tmp_name']);
   $name= addslashes($_FILES['photo']['name']);
   $photo= file_get_contents($photo);
   $photo= base64_encode($photo);*/



echo $request_id ;
  

if((!empty($_POST['name']))&&(!empty($_POST['email'])) &&(!empty($_POST['phonenumber']))  &&(!empty($_POST['pos_name']))  
	&&(!empty($_POST['apart'])))
  {
	 
	echo "Inside If";
	 	  echo $request_id ;
    $name   = get_post($conn, 'name');
    $emailaddress = get_post($conn, 'email');
    $phonenumber = get_post($conn, 'phonenumber');
    
	$apart = get_post($conn, 'apart');
	$start = get_post($conn, 'start');
	$end = get_post($conn, 'end');
	$pos_name = get_post($conn, 'pos_name');
	$rent = get_post($conn, 'rent');
	$email1 = get_post($conn, 'email');
	
	$how = get_post($conn, 'how');
	$phonenumber1 = get_post($conn, 'phonenumber');
	
	
	
	

	
	
	  $query    = "Update colombia_plaza_new set lease_owner='$name', request_poster='$pos_name', email='$email1', address='$apart', start_date='$start', end_date='$end', expected_rent='$rent',  notes='$how',  phonenumber='$phonenumber1' where request_id='$id111'";
	
	echo $query;
	
	$result   = $conn->query($query);
   
    if (!$result) echo "UPDATE failed: $query<br>" .
      $conn->error . "<br><br>";
	  
  }



$conn->close();  

			 

function get_post($conn, $var)
{
 return $conn->real_escape_string($_POST[$var]);


}

function validateDate($date, $format = 'mm-dd-YYYY H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
?>
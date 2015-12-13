<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Form validation using JS</title>
   <!--<script src="js/validation.js"></script>-->
     <!--<link rel="stylesheet" type="text/css" href="css/insert_page.css" />-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
<!-- <script src="js/jquery_ajaz.js"></script>-->
  <!-- <script type="text/javascript" src="js/updatedisplay.js"></script>-->
    <!--<script type="text/javascript" src="js/jquery.loadJSON.js"></script>-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400">
   
     
     
</head>
<body>

<?php
/*error_reporting(E_ALL);

ini_set('display_errors', 1);*/

//$request_id = $_GET['Item_id'];

$flag= False;


  require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

// define variables and set to empty values
$nameErr = $emailErr = $phonenumberErr = $apartErr = $rentErr = $pos_nameErr="";
$name = $email = $phonenumber =  $apart = $rent =$pos_name= "";
$error123=0;

if (isset($_GET['Item_id']) && intval($_GET['Item_id']) > 0)
{
	$updateid=$_GET['Item_id'];
$sql12 = "SELECT * FROM colombia_plaza_new where request_id='$updateid'";
$result12 = $conn->query($sql12);
//echo "$result12";

 $numrows = $result12->num_rows;
while ($row = $result12->fetch_assoc()){
 $rows[] = $row;}

for ($j = 0 ; $j < $numrows ; ++$j)
{
  $result12->data_seek($j);
  $row = $result12->fetch_array(MYSQLI_NUM);
  //$request_id=$row[0];
  $leaseowner=$row[1];
  $request_poster=$row[2];
  $email=$row[3];
  $address=$row[4];
  $start_date=$row[5];
  $end_date=$row[6];
  $expected_rent=$row[7];
  $is_deposit=$row[8];
  $notes=$row[9];
  $phonenumber=$row[10];
  
  //$rows[]=$row;
  }


  //echo json_encode($rows);
  //echo $rows;


}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Please Enter Name";
	 $error123=1;
   } 
   else {
     $name = test_input($_POST["name"]);
     // CHECK if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Please enter only letters and whitespaces";
	   $error123=1;
     }
	 /*else {$a= strlen($name);
                      if ($a <"8")
				{$nameErr  = "Please enter atleast 8 chars ";}
		  }*/
		  
   }
   
   
   
   if (empty($_POST["pos_name"])) {
     $pos_nameErr = "Please Enter Name";
	 $error123=1;
   } 
   else {
     $pos_name = test_input($_POST["pos_name"]);
     // CHECK if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$pos_name)) {
       $pos_nameErr = "Please enter only letters and whitespaces";
	   $error123=1;
     }
	
   }
   
   
   
    if (empty($_POST["apart"])) {
     $apartErr = "Please Address";
	 $error123=1;
   } 
   else {
     $apart = test_input($_POST["apart"]);
     // CHECK if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$apart)) {
       $apartErr = "Please enter only letters and whitespaces";
	   $error123=1;
     }
	
   }
   
   

   if (empty($_POST["email"])) {
     $emailErr = "Please enter email";
	 $error123=1;
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
	   $error123=1;
     }
   }
  
   
   
   
  

   if (empty($_POST["phonenumber"])) {
     $phonenumberErr = "Please Enter PhoneNumber";
	 $error123=1;
	    } else {
	      $phonenumber = test_input($_POST["phonenumber"]);
	
	      // CHECK if name only contains numbers
	      if (!preg_match("/^[0-9]*$/",$phonenumber))  {
	       
		 $phonenumberErr  = "Please enter 10 digit valid number";
		 $error123=1;     	
		}
		else {	$x= strlen($phonenumber);
                      if ($x !="10")
				{$phonenumberErr  = "Please enter 10 digits number";
				$error123=1;}
		  }
		$flag= True;
	          }



		if (!preg_match("/^[0-9]*$/",$rent))  {
	       
		 $rentErr  = "Please enter 10 digit valid number";
		 $error123=1;
		     	
		}
		
		
		
		
		

	    if (empty($_POST["how"])) {
	      $how = "";
	    } else {
	      $how = test_input($_POST["how"]);
	    }


	 }

	 function test_input($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	 }
	 
	 


$conn->close();


	 ?>
     
     
<header>
  <h1>Apartment Information&nbsp;&nbsp;<a href="register.php"><img src=images/crossl.png border=0 alt="close" title="close"></a></h1>
</header>

  <section class="row">
      <div class="grid">

<form enctype="multipart/form-data" class="col-1-3" name='mainForm' id='mainForm' method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset class="register-group">
    <legend>Required Information:</legend>
   
    
      <label for="name">Lease Owner's Name <span class="error"><?php echo $nameErr;?> </span> </label>
      <input name="name" id="name" value="<?php echo $leaseowner; ?>" type="text" size="30" >
    
      <label for="pos_name">Posted by:  <span class="error">  <?php echo $pos_nameErr;?> </span> </label>
      <input name="pos_name" id="pos_name" value="<?php echo $request_poster; ?>" type="text" size="30" >
    
    
   
      <label for="pos_name_check">Posted by same as lease owner  </label>
      <input name="pos_name_check" id="pos_name_check" value="<?php echo $leaseowner; ?>" type="checkbox" onclick="OnChangeCheckbox()" >
   
      <label for="apart">Address <?php echo $apartErr;?></label>
      <input name="apart" id="apart" type="text" value="<?php echo $address; ?>" size="30" >
    
      <label for="acco_perm">Permanent Accomodation</label>
      <input name="acco" id="acco_perm" type="radio"  value="0" checked="checked"> 
          <label for="acco_temp">Temporary Accomodation</label>
      <input name="acco" id="acco_temp" type="radio"  value="1"> 
      
      <label for="phonenumber">Phone Number <span class="error">  <?php echo $phonenumberErr;?> </span></label>
      <input name="phonenumber" id="phonenumber" value="<?php echo $phonenumber; ?>" type="text" size="30" >
      <label for="email">E-mail <span class="error"> <?php echo $emailErr;?></span></label>
      <input name="email" id="email" type="text" value="<?php echo $email; ?>" size="30" >

      <label for="start">Start Date:  </label>
      <input type="hidden" id="updateid" name="updateid" placeholder="ID" value="<?php echo $_GET['Item_id'];?>"/>
      <input name="start" value="<?php echo $start_date; ?>" id="start" type="date" >
    
      <label for="end">End Date: </label>
      <input name="end" id="end" value="<?php echo $end_date; ?>" type="date"  onchange="check_date()">
   
  </fieldset >
  <fieldset class="register-group">
    <legend>Optional Information:</legend>
    
      <label for="rent">Expected Rent: </label>
      <input name="rent" id="rent" value="<?php echo $expected_rent; ?>" type="text" size="30">
      <label for="deposit">Deposit: </label>
      <input name="deposit" id="deposit" value="<?php echo $is_deposit; ?>" type="checkbox" >
       
      
    
    
      <label for="how">Notes</label>
      <input name="how" id="how" type="text" value="<?php echo $notes; ?>" size="30">
    
  </fieldset>
  <input class="btn btn-default" type="submit" name="submit" value="Update">
</form>

</div>
</section>


<?php		
error_reporting(E_ALL);

ini_set('display_errors', 1);
//echo $updateid;



 
 require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db);
  
 if ($conn->connect_error) die($conn->connect_error);
 

/*	if($_FILES['photo']['name'])
{
	//if no errors...
	if(!$_FILES['photo']['error'])
	{
 
   $photo= addslashes($_FILES['photo']['tmp_name']);
   $name= addslashes($_FILES['photo']['name']);
   $photo= file_get_contents($photo);
   $photo= base64_encode($photo);
	}
}
   
  $photo="";  */




  

if((!empty($_POST['name']))&&(!empty($_POST['email'])) &&(!empty($_POST['phonenumber']))  &&(!empty($_POST['pos_name']))  
	&&(!empty($_POST['apart'])))
  {
	 $request_id=$_POST['updateid'];
	//echo "Inside If";
	$request_id ;
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
	
	
	
	

	
	
	  $query    = "Update colombia_plaza_new set lease_owner='$name', request_poster='$pos_name', email='$email1', address='$apart', start_date='$start', end_date='$end', expected_rent='$rent',  notes='$how',  phonenumber='$phonenumber1' where request_id='$request_id'";
	
	//echo $query;
	
	$result   = $conn->query($query);
   
    if (!$result) echo "UPDATE failed: $query<br>" .
      $conn->error . "<br><br>";
	 else echo "<meta http-equiv=\"refresh\" content=\"0;URL=register.php\">";
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

 <footer class="primary-footer container group">

     

      <nav class="nav">
        <ul>
          <li><a href="index.html">Home</a></li><!--
          --><li><a href="page2.php">Add</a></li><!--
          --><li><a href="#">Schedule</a></li><!--
          --><li><a href="#">Venue</a></li><!--
          --><li><a href="#">Register</a></li>
        </ul>
      </nav>

    </footer>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Form validation using JS</title>
   <!--<script src="js/validation.js"></script>-->
     <!--<link rel="stylesheet" type="text/css" href="css/insert_page.css" />-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
<!-- <script src="js/jquery_ajaz.js"></script>-->
   
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400">
   
     
     
</head>
<body>

<?php
/*error_reporting(E_ALL);

ini_set('display_errors', 1);*/

$flag= False;

  require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

// define variables and set to empty values
$nameErr = $emailErr = $phonenumberErr = $apartErr = $rentErr = $pos_nameErr="";
$name = $email = $phonenumber =  $apart = $rent =$pos_name= "";
$error123=0;


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
      <input name="name" id="name" type="text" size="30" >
    
      <label for="pos_name">Posted by:  <span class="error">  <?php echo $pos_nameErr;?> </span> </label>
      <input name="pos_name" id="pos_name" type="text" size="30" >
    
    
   
     
      <label for="apart">Address <?php echo $apartErr;?></label>
      <input name="apart" id="apart" type="text" size="30" >
    
      <label for="acco_perm">Permanent Accomodation</label>
      <input name="acco" id="acco_perm" type="radio"  value="0" checked="checked"> 
          <label for="acco_temp">Temporary Accomodation</label>
      <input name="acco" id="acco_temp" type="radio"  value="1"> 
      
      <label for="phonenumber">Phone Number <span class="error">  <?php echo $phonenumberErr;?> </span></label>
      <input name="phonenumber" id="phonenumber" type="text" size="30" >
      <label for="email">E-mail <span class="error"> <?php echo $emailErr;?></span></label>
      <input name="email" id="email" type="text" size="30" >

      <label for="start">Start Date:  </label>
      <input name="start" id="start" type="date" >
    
      <label for="end">End Date: </label>
      <input name="end" id="end" type="date"  onchange="check_date()">
   
  </fieldset >
  <fieldset class="register-group">
    <legend>Optional Information:</legend>
    
      <label for="rent">Expected Rent: </label>
      <input name="rent" id="rent" type="text" size="30">
    
     
       <label>upload a diplay pic</label>
       <input type="file" name="photo" id="photo"/>
    
    
      <label for="how">Notes</label>
      <input name="how" id="how" type="text" size="30">
    
  </fieldset>
  <input class="btn btn-default" type="submit" name="submit" value="Submit Form">
</form>

</div>
</section>


<?php		
error_reporting(E_ALL);

ini_set('display_errors', 1);


if (isset($_POST['deposit'])) {
$depositbit=1;
    // Checkbox is selected
} else {
$depositbit=0;
   // Alternate code
}




   $photo= addslashes($_FILES['photo']['tmp_name']);
   $name= addslashes($_FILES['photo']['name']);
   $photo= file_get_contents($photo);
   $photo= base64_encode($photo);

   

 
 require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error);

if((!empty($_POST['name']))&&(!empty($_POST['email'])) &&(!empty($_POST['phonenumber']))  &&(!empty($_POST['pos_name']))  
	&&(!empty($_POST['apart'])))
  {
	 
	 echo "Inside If";	  
    $name   = get_post($conn, 'name');
    $emailaddress = get_post($conn, 'email');
    $phonenumber = get_post($conn, 'phonenumber');
    
	$apart = get_post($conn, 'apart');
	$start = get_post($conn, 'start');
	$end = get_post($conn, 'end');
	$pos_name = get_post($conn, 'pos_name');
	$rent = get_post($conn, 'rent');
	
	$how = get_post($conn, 'how');
	

	
	
	  $query    = ("INSERT INTO colombia_plaza_new (lease_owner,request_poster,email,address,start_date,end_date,expected_rent, is_deposit,notes,phonenumber,file)  VALUES" .
      "('$name','$pos_name', '$email', '$apart', '$start', '$end', '$rent', '$depositbit', '$how','$phonenumber','$photo')");
	
	$result   = $conn->query($query);
   
    if (!$result) echo "INSERT failed: $query<br>" .
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

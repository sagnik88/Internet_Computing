<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">


</head>
<body>

<?php
error_reporting(E_ALL);

ini_set('display_errors', 1);

$flag= False;

  require_once 'loginDetails.php';
 $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

// define variables and set to empty values
$nameErr = $emailErr = $phonenumberErr = $zipcodeErr = $cityErr = "";
$name = $email = $phonenumber =  $zipcode = $city = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Please Enter Name";
   } else {
     $name = test_input($_POST["name"]);
     // CHECK if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Please enter only letters and whitespaces";
     }
	 else {$z= strlen($name);
                      if ($z <"8")
				{$nameErr  = "Please enter atleast 8 chars ";}
		  }
   }

   if (empty($_POST["email"])) {
     $emailErr = "Please enter email";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
     }
   }
  
   
   if (empty($_POST["zipcode"])) {
     $zipcodeErr = "Please Enter ZipCode";
   } else {
     $zipcode = test_input($_POST["zipcode"]);
     // CHECK if zipcode  contains only digits
     if (!preg_match("/^[0-9]*$/",$zipcode)) {
       $zipcodeErr = "Please enter only numbers";
     }
	 else {$y= strlen($zipcode);
                      if ($y !="5")
				{$zipcodeErr  = "Please enter 5 digits ";}
		  }
   } 
   
   if (empty($_POST["city"])) {
     $cityErr = "Please Enter City";
   } else {
     $city = test_input($_POST["city"]);
     // CHECK if city  contains only letters
     if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
       $cityErr = "Please enter only letters";
     }
   } 

   if (empty($_POST["phonenumber"])) {
     $phonenumberErr = "Please Enter PhoneNumber";
	    } else {
	      $phonenumber = test_input($_POST["phonenumber"]);
	
	      // CHECK if name only contains numbers
	      if (!preg_match("/^[0-9]*$/",$phonenumber))  {
	       
		 $phonenumberErr  = "Please enter 10 digit valid number";     	
		}
		else {	$x= strlen($phonenumber);
                      if ($x !="10")
				{$phonenumberErr  = "Please enter 10 digits number";}
		  }
		$flag= True;
	          }



	    if (empty($_POST["comment"])) {
	      $comment = "";
	    } else {
	      $comment = test_input($_POST["comment"]);
	    }


	 }

	 function test_input($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	 }

	 ?>

	 <h2>ISTM 6205- Internet Computing</h2>
	 <p><span class="error"></span></p>
	 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="style">
	 
	 <label>
	 * Your Full Name : <input id="name" type="text" name="name" placeholder=" ex: Saketh Kohir" />
	                  <span class="error"> <?php echo $nameErr;?></span>
	  </label>
	  <br><br>
	  
	 <label>

	   * GWMail :<input id="email" type="email" name="email" placeholder="Valid Email Address" />
	                 <span class="error"> <?php echo $emailErr;?> </span>
	 </label>
	  <br><br>
	  
	  <label>
	 * ZipCode : <input id="zipcode" type="text" name="zipcode" placeholder=" ex: 20037" />
	                  <span class="error"> <?php echo $zipcodeErr;?></span>
	  </label>
	  <br><br> 
	  
	  <label>
	  * PhoneNumber : <input id="phonenumber" type="text" name="phonenumber" placeholder="Your Phone Number ex: 9781231234" />
	                  <span class="error"> <?php echo $phonenumberErr;?></span>
	  </label>
	         <br><br>
	  <label>
	  * City : <input id="city" type="text" name="city" placeholder=" ex: Washington" />
	                  <span class="error"> <?php echo $cityErr;?></span>
	  </label>
	         <br><br> 

	      <label>
	         File Upload :<select name="selection">
	         <option value="Job Inquiry">jpg</option>
	                 <option value="General Question">png</option>
	         <option value="General Question">jpeg</option>
			         </select>
			     </label>


			    <input type="submit" name="submit" class = "button" value="Submit">
				<!--<h2><a href="store.html">Store</a> </h2> -->
			 </form>

			 
			 

<?php		
error_reporting(E_ALL);

ini_set('display_errors', 1); 

if((!empty($_POST['name']))&&(!empty($_POST['email'])) &&(!empty($_POST['phonenumber']))  &&(!empty($_POST['zipcode']))  
	&&(!empty($_POST['city'])))
  {
	  //echo $zipcode ;
	  
	 	  
    $name   = get_post($conn, 'name');
    $emailaddress = get_post($conn, 'email');
    $phonenumber = get_post($conn, 'phonenumber');
     $city = get_post($conn, 'city');
	$zipcode = get_post($conn, 'zipcode');
	//echo $zipcode ;
 //   $query    = "INSERT INTO userinput (name, email, phonenumber,zipcode)  VALUES" .
   //   "('$name', '$emailaddress', '$phonenumber','$zipcode')";
	  
	  $query    = ("INSERT INTO userinput (name, email, phonenumber,city,zipcode)  VALUES
      ('$name', '$emailaddress', '$phonenumber','$city','$zipcode')");
	  
	//  mysql_query("INSERT INTO ACCOUNTS(currentbalance, balancein, category, notes) ##### sample code
      //    VALUES ('$balancenew', '$difference', '$category', '$notes')"); 
	   
	$result   = $conn->query($query);
   // echo $result;
    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
	  //else {header("location: storenew.php");}
  }

$sql = "SELECT *  FROM userinput";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "id: " . $row["id"]. " - Email: " . $row["email"]. " " . " - PhoneNumber: ". $row["phonenumber"]. "<br>";
}
} else {
    echo "0 results";
}

$conn->close();  

			 

function get_post($conn, $var)
{
 return $conn->real_escape_string($_POST[$var]);


}

?>
 

			 </body>
			 </html>


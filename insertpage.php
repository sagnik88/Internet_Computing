<!DOCTYPE HTML> 
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/insert_page.css" />

<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr ="";
$checksum =0;
$name = $email = $gender = $comment = $website = "";

$apart = test_input($_POST["apart"]);

$pos_name = test_input($_POST["pos_name"]);

$rent = test_input($_POST["rent"]);

$deposit = test_input($_POST["deposit"]);

$how = test_input($_POST["how"]);





if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["posted"])) {
     $postedErr = "Posted Name is required";
   } else {
     $posted = test_input($_POST["posted"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$posted)) {
       $postedErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
   
   if (empty($_POST["address"])) {
     $addressErr = "Address is required";
   } else {
     $address = test_input($_POST["address"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$address)) {
       $addressErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["start"])) {
     $startErr = "Start Date is required";
   } else {
     $start = test_input($_POST["start"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$start)) {
       $startErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["end"])) {
     $endErr = "End Date is required";
   } else {
     $end = test_input($_POST["end"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$end)) {
       $endErr = "Only letters and white space allowed"; 
     }
   }
   
   
     
   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Form Validation</h2>
<p><span class="error">* required field.</span></p>
<form method="post" name='mainForm' id='mainForm' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<fieldset>
    <legend>Required Information:</legend>
	
	
	

   
    <div class='movingDiv'>
      <label for="name">Lease Owner's Name</label>
      <input name="name" id="name" type="text" size="30" class="required" value="<?php echo $name;?>">
	  <span class="error">* <?php echo $nameErr;?></span>
    </div>
   
   	<br><br>
  
   
   <div class='movingDiv'>
      <label for="pos_name">Posted by:</label>
      <input name="pos_name" id="pos_name" type="text" size="30" class="required" value="<?php echo $posted;?>">
	  <span class="error">* <?php echo $postedErr;?></span>	   
    </div>
	<br><br>
   
   
   
   <div class='movingDiv'>
      <label for="pos_name_check">Posted by same as lease owner</label>
      <input name="pos_name_check" id="pos_name_check" type="checkbox" >
    </div>
   <br><br>
   
   <div class='movingDiv'>
      <label for="email">email:</label>
    <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   </div>
   <br><br>
   
   <div class='movingDiv'>
      <label for="apart">Address </label>
      <input name="apart" id="apart" type="text" size="30" class="required" value="<?php echo $address;?>">
	  <span class="error">* <?php echo $addressErr;?></span>
    </div>
	<br><br>
	
	
	 <div class='movingDiv'>
      <label for="start">Start Date:</label>
      <input name="start" id="start" type="date" class="required" value="<?php echo $start;?>">
	  <span class="error">* <?php echo $startErr;?></span>
    </div>
	
	<br><br>
	
	
    <div class='movingDiv'>
      <label for="end">End Date</label>
      <input name="end" id="end" type="date" class="required"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <span class="error">* <?php echo $endErr;?></span>
	  
    </div>
	
  </fieldset>
  <legend>Optional Information:</legend>
   
   <fieldset>
   <legend>Optional Information:</legend>
    <div class='movingDiv'>
      <label for="rent">Expected Rent: </label>
      <input name="rent" id="rent" type="text" size="30">
    </div>
	
	<br><br>
    
    <div class='movingDiv'>
      <label for="deposit">Deposit: </label>
      <input name="deposit" id="deposit" type="checkbox" >
    </div>

    <br><br>
	
    <div class='movingDiv'>
      <label for="how">Notes</label>
      <textarea	  name="how" id="how" type="text" size="30"></textarea>
    </div>
   </fieldset>
   <input type="submit" name="submit" value="Submit Form">
</form>


<?php
//echo "<h3>Input Entered:</h3>";




 require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);

 if ($conn->connect_error) {
    die('Connect Error: ' . $conn->connect_error);
}

    $query = "INSERT INTO colombia_plaza_new (lease_owner,request_poster,email,address,start_date,end_date,expected_rent, is_deposit,notes)  VALUES" .
      "('$name','$pos_name', '$email', '$apart', '$start', '$end', '$rent', '$deposit', '$how')";

    $result   = $conn->query($query);

if ($result) 
    {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=page3.html\">";
        $conn->close();
    }

    else
    {
        echo "INSERT failed: $query<br>" .
        $conn->error . "<br><br>";
        $checksum=1;
        $conn->close();
    }
	
	
	
	
	
	
    if (!$result) 
	{
		echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
	  $checksum=1;
	  $conn->close();
	}
	
	if ($result==1)
	{
		//$conn->close();
		//var_dump($path);
		//echo "<meta http-equiv=\"refresh\" content=\"0;URL=page3.html\">"; 
		header('Location: page3.html/');
	}

  $conn->close();

$conn = new mysqli($hn, $un, $pw, $db);
  $query  = "SELECT request_id,lease_owner,request_poster,
email,address,start_date,end_date,
case expected_rent when '' then 'N/A' else expected_rent end as expected_rent, 
case is_deposit when 1 then 'Yes' else 'No' end as is_deposit,
case notes when '' then 'N/A' else notes end as notes
 FROM colombia_plaza_new  where lease_owner is not null and request_poster is not null and email is not null and lease_owner!=''";
 $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;

  
  echo "<table border=1>";
  echo "<thead>";
echo "<tr>";
echo "<td width=150> Request id </td> ";
echo "<td width=150> Name </td> ";
echo "<td width=200> Poster Name </td>";
echo "<td width=50> e-mail </td>";
echo "<td width=50>address</td>";
echo "<td width=50>start date</td>";
echo "<td width=50>end date</td>";
echo "<td width=50>rent</td>";
echo "<td width=50>deposit</td>";
echo "<td width=50>notes</td>";
echo "</tr>";
 echo "</thead>";  
  echo "<tbody>";
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
  
    

echo "<tr>";
echo "<td width=150> $row[0] </td> ";
echo "<td width=200> $row[1] </td>";
echo "<td width=50> $row[2] </td>";
echo "<td width=50> $row[3] </td>";
echo "<td width=50>$row[4]</td>";
echo "<td width=50>$row[5]</td>";
echo "<td width=50>$row[6]</td>";
echo "<td width=50>$row[7]</td>";
echo "<td width=50>$row[8]</td>";
echo "<td width=50>$row[9]</td>";
echo "</tr>";

}

echo "</tbody>";
echo "</table>";
?>
</body>
</html>
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
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

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
      <input name="end" id="end" type="date" class="required"  value="<?php echo $end;?>">
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
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $posted;
echo "<br>";
echo $address;
echo "<br>";
echo $start;
echo "<br>";
echo $end;

?>

</body>
</html>
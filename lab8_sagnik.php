<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Form validation using JS</title>
   
     <link rel="stylesheet" type="text/css" href="css/insert_page.css" />
</head>
<body>


<?php
// define variables and set to empty values
$nameErr = $postedErr = $startErr = $endErr = "";
$name = $posted = $start = $end =  "";

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
     $postedErr = "posted person is required";
   } else {
     $posted = test_input($_POST["posted"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$posted)) {
       $postedErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["start"])) {
     $postedErr = "start date is required";
   } else {
     $posted = test_input($_POST["posted"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$posted)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["end"])) {
     $endErr = "end date is required";
   } else {
     $end = test_input($_POST["end"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$end)) {
       $endErr = "Only letters and white space allowed"; 
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
  <h1>Apartment Information&nbsp;&nbsp;<a href="page3.html"><img src=images/crossl.png border=0 alt="close" title="close"></a></h1>
</header>

<form name='mainForm' id='mainForm' method='get' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
    <legend>Required Information:</legend>
    <div class='movingDiv'>
      <label for="name">Lease Owner's Name</label>
      <input name="name" id="name" type="text" size="30" class="required" value="<?php echo $name;?>">
	  <span class="error">* <?php echo $nameErr;?></span>
    </div>
    
    <div class='movingDiv'>
      <label for="pos_name">Posted by:</label>
      <input name="pos_name" id="pos_name" type="text" size="30" class="required" value="<?php echo $posted;?>">
	   <span class="error">* <?php echo $postedErr;?></span>
    </div>
    
    <div class='movingDiv'>
      <label for="pos_name_check">Posted by same as lease owner</label>
      <input name="pos_name_check" id="pos_name_check" type="checkbox" onclick="OnChangeCheckbox()" >
    </div>
    
        <div class='movingDiv'>
      <label for="apart">Address </label>
      <input name="apart" id="apart" type="text" size="30" class="required">
    </div>
            <div class='movingDiv'>
      <label for="acco_perm">Permanent Accomodation</label>
      <input name="acco" id="acco_perm" type="radio" class="required" value="0" checked="checked"> 
          <label for="acco_temp">Temporary Accomodation</label>
      <input name="acco" id="acco_temp" type="radio"  value="1"> 
    </div>
                <div class='movingDiv'>
      <label for="start">Start Date:</label>
      <input name="start" id="start" type="date" class="required" value="<?php echo $start;?>">
	  <span class="error">* <?php echo $startErr;?></span>
    </div>
    <div class='movingDiv'>
      <label for="end">End Date</label>
      <input name="end" id="end" type="date" class="required" onchange="check_date()" value="<?php echo $end;?>">
	  <span class="error">* <?php echo $endErr;?></span>
    </div>
  </fieldset>
  <fieldset>
    <legend>Optional Information:</legend>
    <div class='movingDiv'>
      <label for="rent">Expected Rent: </label>
      <input name="rent" id="rent" type="text" size="30">
    </div>
    
    <div class='movingDiv'>
      <label for="deposit">Deposit: </label>
      <input name="deposit" id="deposit" type="checkbox" >
    </div>
    
    <div class='movingDiv'>
      <label for="how">Notes</label>
      <input name="how" id="how" type="text" size="30">
    </div>
  </fieldset>
  <input type="submit" name="submit" value="Submit Form">
</form>

</body>
</html>

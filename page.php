<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Apartment Information</title>
<!--<link rel="stylesheet" href="css/style.css" type="text/css">-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
 <!--<script src="js/jquery_ajaz.js"></script>-->
 <!--<script type="text/javascript" src="js/calendar.js"></script>-->
  <script type="text/javascript" src="js/display_form.js"></script>

<script type="text/javascript" src="js/page3.js"></script>
   
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400">
</head>

<body>
	<header class="primary-header container group">

      <h1 class="logo">
        <a href="index.html">GW <br> Desis</a>
      </h1>    

      <nav class="nav primary-nav">
        <ul>
          <li><a href="index.html">Home</a></li><!--
          --><li><a href="#">Speakers</a></li><!--
          --><li><a href="#">Schedule</a></li><!--
          --><li><a href="#">Venue</a></li><!--
          -->
          <li><a href="register.html">Register</a></li></ul></nav>

    </header>
    
    
    <section class="row">
<div class="grid">
<table id="msg">

</table>



<section class="row">
<div class="grid">



 <form action="delete.php" method="POST">
          <input type="hidden" name="id" value="<?php echo htmlentities($_GET["Item_id"]); ?>" />
          <input class="btn btn-default" type="submit" value="Delete" />
</form>




</div>
</section>

</div>
</section>



<?php
/* require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error);
 
  $query    = ("select file from colombia_plaza_new where request_id=50");
	
$result   = $conn->query($query);
echo $result;*/
 
 
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




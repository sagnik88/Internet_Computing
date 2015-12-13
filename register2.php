<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Register - Styles Conference</title>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
 <script src="js/for_check.js"></script>
 
 <!-- <script src="js/jquery_ajaz.js"></script>-->
   
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400">
  
  </head>

  <body>

    <!-- Header -->

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

    <!-- Lead -->

  

    <!-- Main content -->

    <section class="row">
      <div class="grid">

        <!-- Details -->

      <!--

        Registration form

        --><form class="col-1-3" action="#" method="post">

          <fieldset class="register-group" >
<legend >Search</legend>
            <label id="name" class="floatleft">
              Name
              <input type="text" name="name" placeholder="Full name" >
            </label>

            <label id="email" class="floatleft">
              Email
              <input type="email" name="email" placeholder="Email address" >
            </label>

            

          </fieldset>

          <input class="btn btn-default" type="submit" name="submit" value="Search">
          <input type="button" value="Add" class="btn btn-default" id="btnHome" 
onClick="document.location.href='page2.php'" />

        </form>

      </div>
    </section>
    
    
    <!--Table-->
   
  <section class="row">
      <div class="grid"> 
 <table border="1" id="msg"><tr>
 <th>checkbox</th>
 <th>Lease Owner</th>
 <th>Request Poster</th>
<th>email</th><th>address</th>
<th>start date</th>
<th>end date</th>
<th>expected rent</th>
<th>deposit</th>
<th>notes</th>
<th>View</th>
<th>Update</th>
<th>Delete</th></tr>
</table>
</div>

</section>
    
    
    <!-- Footer -->

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

<?php 

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);

$item_id = $_GET["Item_id"];

$query2 = "delete from colombia_plaza_new where request_id='$item_id'";

$result2   = $conn->query($query2);

?>
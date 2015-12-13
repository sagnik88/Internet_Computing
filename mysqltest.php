<?php // sqltest.php
error_reporting(E_ALL);

ini_set('display_errors', 1);

  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['delete']) && isset($_POST['id']))
  {
    $id   = get_post($conn, 'id');
    $query  = "DELETE FROM colombia_plaza WHERE request_id='$id'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  if (isset($_POST['name'])   &&
	 (isset($_POST['pos_name'])   &&
	 (isset($_POST['email'])   &&
	 (isset($_POST['apart'])   &&
	 (isset($_POST['start'])   &&
	 (isset($_POST['end'])   &&
	 (isset($_POST['rent'])   &&
	 (isset($_POST['deposit'])   &&
      isset($_POST['how']))
  {
    $name   = get_post($conn, 'name');
    $pos_name = get_post($conn, 'pos_name');
	$email = get_post($conn, 'email');
	$apart = get_post($conn, 'apart');
	$start = get_post($conn, 'start');
	$end = get_post($conn, 'end');
	$rent = get_post($conn, 'rent');
	$deposit = get_post($conn, 'deposit');
	$how = get_post($conn, 'how');
    $query    = "INSERT INTO colombia_plaza (request_poster,email,address,start_date,end_date,expected_rent, is_deposit,notes)  VALUES" .
      "('$pos_name', '$email', '$apart', '$start', '$end', '$rent', '$deposit', '$how')";
    $result   = $conn->query($query);
    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }


  $query  = "SELECT * FROM colombia_plaza";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
        request_id $row[0]
    request_poster $row[1]
     request_poster $row[2]
	 email $row[3]
	 address $row[4]
	 start_date $row[5]
	 end_date $row[6]
	 expected_rent $row[7]
	 is_deposit $row[8]
  </pre>
  <form action="mysqltest.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="id" value="$row[0]">
  <input type="submit" value="DELETE RECORD"></form>
_END;
  }

  $result->close();
  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>

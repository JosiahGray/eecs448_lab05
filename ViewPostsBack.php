<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jgray", "jgray1", "jgray");

//check connection
if($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query = "SELECT user_id FROM Users";

if($result = $mysqli->query($query))
{
  while($row = $result->fetch_assoc())
  {
    echo "<option value=".$row["user_id"].">".$row["user_id"]."</option>";
  }

  //free result set
  $result->free();
}

//close connection
$mysqli->close();
?>

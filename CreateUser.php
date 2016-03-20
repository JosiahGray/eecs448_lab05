<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jgray", "jgray1", "jgray");

//check connection
if($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$username = $_POST["user_id"];

if($username == "")
{
  echo "ERROR: User ID cannot be blank.<br>";
}
else
{
  $query = "INSERT INTO Users (user_id) VALUES ('$username');";

  //attempt to insert username into database
  if($result = $mysqli->query($query))
  {
    echo "$username was successfully added to the database!<br>";
  }
  else
  {
    echo "ERROR: \"$username\" is already in the database or otherwise could not be added.<br>";
  }
}

//provide a link to go back
echo "<br><a href=\"http://people.eecs.ku.edu/~jgray/eecs_448/lab05/CreateUser.html\"> Return to CreateUser page </a>";

//close connection
//$result->free();
$mysqli->close();
?>

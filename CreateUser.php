<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jgray", "jgray1", "jgray");

//check connection
if($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$username = $_POST["user_id"];

$query = "INSERT INTO Users (user_id) VALUES ('$username');";

if($result = $mysqli->query($query))
{
  echo "$username was successfully added to the database!\n";
}
else
{
  echo "ERROR: $username is already in the database\n or otherwise could not be added.\n";
}

echo "<br><a href='http://people.eecs.ku.edu/~jgray/eecs_448/lab05/CreateUser.html'> Return to CreateUser page </a>";
?>

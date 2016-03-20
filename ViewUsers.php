<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jgray", "jgray1", "jgray");

//check connection
if($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

//Display a table of all usernames
//echo "Here is a list of all current users:<br><br>";
echo "<table border=\"1\" style=\"border-collapse: collapse\">";
echo "<tr>";
echo "<th> Current Users </th>";
echo "</tr>";

$query = "SELECT user_id FROM Users";

if($result = $mysqli->query($query))
{
	while($row = $result->fetch_assoc())
	{
    //printf("%s <br>", $row["user_id"]);
    echo "<tr>";
    echo "<td>".$row["user_id"]." </td>";
    echo "</tr>";
	}

  //free result set
	$result->free();
}

echo "</table>";

//provide a link to go back
echo "<br><a href=\"http://people.eecs.ku.edu/~jgray/eecs_448/lab05/AdminHome.html\"> Return to AdminHome page </a>";

//close connection
$mysqli->close();
?>

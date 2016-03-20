<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jgray", "jgray1", "jgray");

//check connection
if($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$username = $_POST["userDropdown"];

//Display a table of posts by user
echo "<table border=\"1\" style=\"border-collapse: collapse\">";
echo "<tr>";
echo "<th> Posts by ".$username."</th>";
echo "</tr>";

$query = "SELECT content FROM Posts WHERE author_id='$username'";

if($result = $mysqli->query($query))
{
	while($row = $result->fetch_assoc())
	{
    echo "<tr>";
    echo "<td>".$row["content"]." </td>";
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

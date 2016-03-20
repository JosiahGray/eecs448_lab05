<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jgray", "jgray1", "jgray");

//check connection
if($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query = "SELECT post_id, author_id, content FROM Posts ORDER BY post_id ASC";

if($result = $mysqli->query($query))
{
  while($row = $result->fetch_assoc())
  {
    echo "<tr>";
    echo "<td><input type=\"checkbox\" name=\"check_list[]\"></td>";
    echo "<td>".$row["post_id"]."</td>";
    echo "<td>".$row["author_id"]."</td>";
    echo "<td>".$row["content"]."</td>";
    echo "</tr>";
  }

  //free result set
  $result->free();
}

//close connection
$mysqli->close();
?>

<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jgray", "jgray1", "jgray");

//check connection
if($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$username = $_POST["user_id"];
$posttext = $_POST["post"];

$query = "SELECT user_id FROM Users";

//check if user exists
$userExists = false;

if($result = $mysqli->query($query))
{
	while($row = $result->fetch_assoc())
	{
		if($username == $row["user_id"])
		{
			$userExists = true;
		}
	}

	$result->free();
}

//if user exists and post is valid, store it; otherwise display an error.
if($userExists == false)
{
	echo "ERROR: invalid username.<br>";
}
else
{
	if($posttext == NULL || $posttext == "" || empty($posttext))
	{
		echo "ERROR: post textfield was left empty.<br>";
	}
	else
	{
		$query = "INSERT INTO Posts (content, author_id) VALUES ('$posttext','$username');";

		//attempt to insert post into database
		if($result = $mysqli->query($query))
		{
			echo "Post was successfully saved to the database!<br>";
		}
		else
		{
			echo "ERROR: post could not be saved to the database.<br>";
		}
		//$result->free();
	}
}

//provide a link to go back
echo "<br><a href=\"http://people.eecs.ku.edu/~jgray/eecs_448/lab05/CreatePosts.html\"> Return to CreatePosts page </a>";

//close connection
$mysqli->close();
?>

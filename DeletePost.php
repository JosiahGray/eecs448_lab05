<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jgray", "jgray1", "jgray");

//check connection
if($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

//get array of checked boxes
$markedPosts = $_POST["check_list"];
$size = count($markedPosts);

if(empty($markedPosts))
{
	echo "You did not select any posts to be deleted.<br>";
}
else
{
	echo "You chose to delete $size posts:<br><br>";

	//loop through checked posts and delete them
	for($i=0; $i < $size; $i++)
	{
		$query = "DELETE FROM Posts WHERE post_id='".$markedPosts[$i]."';";

		//attempt to delete post from database
		if($result = $mysqli->query($query))
		{
			echo "Post ID - ".$markedPosts[$i]." was successfully deleted.<br>";
		}
		else
		{
			echo "ERROR: Post ID - ".$markedPosts[$i]." could not be deleted.<br>";
		}
	}
}

//provide a link to go back
echo "<br><a href=\"http://people.eecs.ku.edu/~jgray/eecs_448/lab05/AdminHome.html\"> Return to AdminHome page </a>";

//close connection
$mysqli->close();
?>

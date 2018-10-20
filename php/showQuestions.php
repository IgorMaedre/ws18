<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
  </head>
</html>
<?php

	include 'dbConfig.php';

	$connection = new mysqli($server, $user, $pass, $database);

	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}

	$sql= "SELECT * FROM questions";
	$result = $connection->query($sql);

	echo "<table><tr><th>Email</th><th>Question</th><th>Correct answer</th><th>Wrong answer 1</th><th>Wrong answer 2</th><th>Wrong answer 3</th><th>Difficulty</th><th>Theme</th></tr>";
	if ($result->num_rows > 0){
		//data output by rows
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row['email'] . "</td><td>" . $row['question'] . "</td><td>" . $row['correctans'] . "</td><td>" . $row['wrongans1'] . "</td><td>" . $row['wrongans2'] . "</td><td>" . $row['wrongans3'] . "</td><td>" . $row['difficulty'] . "</td><td>" . $row['theme'] . "</td></tr>";
		}
		echo "</table>";
	} else {
		echo "No questions have been added yet. <br>";
	}

	$connection->close();

	echo "Itzuli hasierako orrira: <a href='../layout.html'>Layout</a> <br> Egin galdera berri bat: <a href='../addQuestion5.html'>AddQuestion5</a>";
?>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
  </head>
</html>
<?php 
	
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "quizz";

	$conn = new mysqli($server, $user, $pass, $database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";

	$email = $_POST["eposta"];
	$quest = $_POST["galdera"];
	$corr = $_POST["ezuz"];
	$wro1 = $_POST["eok1"];
	$wro2 = $_POST["eok2"];
	$wro3 = $_POST["eok3"];
	$diff = $_POST["zail"];
	$theme = $_POST["gaia"];

	$sql = "INSERT into Questions (email, question, correctans, wrongans1, wrongans2, wrongans3, difficulty, theme) VALUES ('$email', '$quest', '$corr', '$wro1', '$wro2', '$wro3', '$diff', '$theme')";

	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	echo "<a href='../layout.html'>Itzuli hasierara</a>";

?>
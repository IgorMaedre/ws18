<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
  </head>
</html>
<?php 
	
	include 'dbConfig.php';

	$connection = new mysqli($server, $user, $pass, $database);

	$email = $_POST["eposta"];
	$quest = $_POST["galdera"];
	$corr = $_POST["ezuz"];
	$wro1 = $_POST["eok1"];
	$wro2 = $_POST["eok2"];
	$wro3 = $_POST["eok3"];
	$diff = $_POST["zail"];
	$theme = $_POST["gaia"];

	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}

	if ($email = "" || $quest = "" || $corr = "" || $wro1 = "" || $wro2 = "" || $wro3 = "" || $theme = "") {
		
		echo "Some field was left empty!!";

	} else if (strlen($quest) < 10) {
		
		echo "The question is shorter than 10 characters!!";

	} else if (preg_match("[a-z]{3,}[0-9]{3}@ikasle.ehu.eus", $email)) {
		
		echo "The email doesn't fulfill the pattern required";

	} else {
		
		$sql = "INSERT into Questions (email, question, correctans, wrongans1, wrongans2, wrongans3, difficulty, theme) VALUES ('$email', '$quest', '$corr', '$wro1', '$wro2', '$wro3', '$diff', '$theme')";

		if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}

	$connection->close();

	echo "Itzuli hasierako orrira: <a href='../layout.php'>Layout</a> <br> Egin galdera berri bat: <a href='../addQuestion5.html'>AddQuestion5</a> <br> Ikusi datubaseko galderak: <a href='showQuestions.php'>ShowQuestions</a>";
?>
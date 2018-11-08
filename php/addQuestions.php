<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='../styles/style.css' />
    <link rel='stylesheet' type='text/css' href='../styles/validation.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../styles/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../styles/smartphone.css' />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/input.js"></script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href="anonimous.php">LogOut</a> </span>
      <!--<span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>-->
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../layout.php'>Home</a></span>
		<span><a href='/quizzes'>Quizzes</a></span>
		<span><a href='../credits.php'>Credits</a></span>
		<span><a href='addQuestions.php'>Add Question</a></span>
		<span><a href='showQuestions.php'>Show Questions</a></span>
		<span><a href='showXMLQuestions.php'>Show XML Questions</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div class="container">
		<form id="galderenF" name="galderenF" action="addQuestions.php" method="POST">
			<label>Zure eposta: (*)</label> 
			<input id="eposta" name="eposta" type="text" required pattern="[a-zA-Z]{3,}[0-9]{3}@ikasle.ehu.eus"><br>
			<label>Galdera: (*)</label> 
			<input id="galdera" name="galdera" type="text" required minlength="10"><br><br>
			<label>Erantzun zuzena: (*)</label> 
			<input id="ezuz" name="ezuz" type="text" required><br>
			<label>Erantzun okerra1: (*)</label> 
			<input id="eok1" name="eok1" type="text" required><br>
			<label>Erantzun okerra2: (*)</label> 
			<input id="eok2" name="eok2" type="text" required><br>
			<label>Erantzun okerra3: (*)</label> 
			<input id="eok3" name="eok3" type="text" required><br><br>
			<label>Galderaren zailtasuna: (*)</label>
			<select id="zail" name="zail" required>
				<option value="0">0</option>
  				<option value="1">1</option>
  				<option value="2">2</option>
  				<option value="3">3</option>
  				<option value="4">4</option>
  				<option value="5">5</option>
			</select><br><br>
			<label>Galderaren gaia: (*)</label> 
			<input id="gaia" name="gaia" type="text" required><br><br>
			<input type="submit" id="sub" value="Gehitu galdera"><br>
		</form>
	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/IgorMaedre/ws18'>Link GITHUB</a>
	</footer>
</div>



</body>
</html>

<?php 
	
	if(isset($_POST["eposta"]) && isset($_POST["galdera"]) && isset($_POST["ezuz"]) && isset($_POST["eok1"]) && isset($_POST["eok2"]) && isset($_POST["eok3"]) && isset($_POST["gaia"])){

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

		} else if (mb_strlen($quest) <= 10) {
			
			echo "<script> alert('The question is shorter than 10 characters!!') </script>";

		/*} else if (preg_match('/[a-zA-Z]{3,}[0-9]{3}@ikasle.ehu.eus/', $email)) {
			
			echo "<script> alert('The email doesn't fulfill the pattern required') </script>";
			*/
		} else {
			
			$sql = "INSERT into Questions (email, question, correctans, wrongans1, wrongans2, wrongans3, difficulty, theme) VALUES ('$email', '$quest', '$corr', '$wro1', '$wro2', '$wro3', '$diff', '$theme')";

			if ($connection->query($sql) === TRUE) {
	    		echo "<script> alert('New record created successfully') </script>";
			} else {
	    		echo "<script> alert('Error: ' . $sql . '<br>' . $connection->error) </script>";
			}

		}
		
		$connection->close();

		$xml = simplexml_load_file('../questions.xml');
		$question = $xml->addChild('assessmentItem');

		$question->addAttribute('author', $email);
		$question->addAttribute('subject', $theme);

		$galdera = $question->addChild('itemBody');
		$erzuzena = $question->addChild('correctResponse');
		$erokerrak = $question->addChild('incorrectResponses');

		$galdera->addChild('p', $quest);
		$erzuzena->addChild('value', $corr);
		$erokerrak->addChild('value', $wro1);
		$erokerrak->addChild('value', $wro2);
		$erokerrak->addChild('value', $wro3);
		
		$xml->asXML('../questions.xml');
	}
?>
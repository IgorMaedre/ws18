<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='../styles/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../styles/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../styles/smartphone.css' />
	<link rel='stylesheet' type='text/css' href='../styles/tables.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href='php/logIn.php'>Log In</a> </span>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Quizz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../anonimous.php'>Home</a></span>
		<!--<span><a href='/quizzes'>Quizzes</a></span> -->
		<span><a href='../creditsA.html'>Credits</a></span>
		<!-- <span><a href='addQuestion5.html'>Add Question (HTML5)</a></span>
		<span><a href='php/showQuestions.php'>Show Questions</a></span> -->
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	
		<h2>Identify yourself</h2>
		<form method="POST" action="login.php" id="login" name="login">
			<fieldset>
				<legend>Authentication panel: </legend>
				Email: <input type="email" name="email" id="email" value="" size="50"> <p>
				Password: <input type="password" name="passw" id="passw" value="" size="50"> <p>
				<input type="submit" value="Log In" id="logB" name="logB"> <p>	
			</fieldset>
		</form>
		Not registered yet? <a href="signUp.php">Sign Up</a>
		
		<?php
			if(isset($_POST['email'])){
				$usr_email=$_POST['email'];
				$usr_pass=$_POST['passw'];
				$count_rows = 0;

				include 'dbConfig.php';

				$connection = new mysqli($server, $user, $pass, $database);

				if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
				}

				$sql= "SELECT * FROM users where email='$usr_email' and passw='$usr_pass'";
				$result = $connection->query($sql);

				if(!($result)){ 
					echo "Error in the query" . $connection->error; 
				} else {
					$count_rows = $result->num_rows;

				}
				$connection->close();
				if ($count_rows==1){
					$count_rows=0;
					echo "<script> alert('Access granted!') </script>";
					header('location: ../layout.php');
				} else {
					echo "<script> alert('Authentication failure!') </script>";
				}
			}
			
		?>

	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/IgorMaedre/ws18'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>


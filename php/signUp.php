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
      <span class="right"><a href='login.php'>Log In</a> </span>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Quizz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../anonimous.php'>Home</a></span>
		<span><a href='/quizzes'>Quizzes</a></span>
		<span><a href='../creditsA.php'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>

		<h2>Register yourself</h2>
		<form method="POST" action="signUp.php" id="signup" name="signup">
			<fieldset>
				<legend>User registration: </legend>
				Email: <input type="email" name="email" id="email" value="" size="50"> <p>
				Username: <input type="user" name="user" id="user" value=""> <p>
				Surname: <input type="surname" name="surname" id="surname" value=""> <p>
				Password: <input type="password" name="passw" id="passw" value="" size="50"> <p>
				Repeat password: <input type="password" name="pass2" id="pass2" value="" size="50"> <p>
				<input type="submit" value="Register" id="signUp" name="signUp"> <p>	
			</fieldset>
		</form>
		Already registered? Then log in <a href="login.php">Log In</a>
		
		<?php

			if(isset($_POST["email"]) && isset($_POST["user"]) && isset($_POST["surname"]) && isset($_POST["passw"]) && isset($_POST["pass2"])){

				include 'dbConfig.php';

				$email = $_POST["email"];
				$usern = $_POST["user"];
				$srname = $_POST["surname"];
				$passw = $_POST["passw"];
				$pass2 = $_POST["pass2"];

				if ($passw != $pass2) {
					
					echo "<script> alert('Password does not match!') </script>";
				
				} else {

					$connection = new mysqli($server, $user, $pass, $database);

					if ($connection->connect_error) {
					die("Connection failed: " . $connection->connect_error);
					}

					$sql= "INSERT into users (email, name, surname, passw) VALUES ('$email', '$usern', '$srname', '$passw')";

					if ($connection->query($sql) === TRUE) {
						$connection->close();
			    		echo "New user created successfully";
			    		header('location: ../anonimous.php');
					} else {
			    		echo "Error: " . $sql . "<br>" . $connection->error;
			    		$connection->close();
					}

					

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


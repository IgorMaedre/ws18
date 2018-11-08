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
      <span class="right"><a href='../anonimous.php'>Log Out</a> </span>
      <!--<span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>-->
	<h2>Quizz: crazy questions</h2>
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
    
	
	<div>
	
		<?php

			

			echo "<table><tr><th>Email</th><th>Question</th><th>Correct answer</th></tr>";
			
			$xml = simplexml_load_file("../questions.xml");
			foreach ($xml->children() as $question) {
				
				$text = "<tr>";
				$text .= "<td>" . $question['author'] . "</td>";
				$text .= "<td>" . $question->itemBody->p . "</td>";
				$text .= "<td>" . $question->correctResponse->value . "</td>";
				$text .= "</tr>";
				echo($text);
			}

			echo "</table>";
			
		?>

	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/IgorMaedre/ws18'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

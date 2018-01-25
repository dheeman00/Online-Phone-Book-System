<?php
			session_start();//start session variable
?>
<html>
		<title> Phone Book Project </title>
		<style type="text/css">
			body {text-align: center;
			background-color: LightBlue;
			font-size: 3em}
		</style>
	  <head>
<?php

			define('DB_NAME' ,'phonebook');
			define('DB_USER' ,'root');
			define('DB_PASSWORD', '');
			define('DB_HOST', 'localhost');
			$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
			
			if(!$link)
			{
				die('Could not connect: '.mysql_error());
			}
			
			$db_selected = mysqli_select_db($link, DB_NAME);
				
			if(!$db_selected)
			{
				die('Can not use' .DB_NAME. ': ' .mysql_error());
			}
	
		$link = new PDO("mysql:host=localhost;dbname=phonebook", 'root', '',
				array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));	
		$link->exec("use phonebook");
		
		$statement = $link->prepare("select * from employee 
			where username = :username");
		$username = trim($_POST['loginUsername']);
		$statement->bindParam(':username', $username);
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$result = $statement->fetch();
		if (!empty($result) && password_verify($_POST['loginPassword'], $result["Password"])) {

			if ($result["Role"] == "admin" || $result["Role"] == "Admin")
				echo " <meta http-equiv=\"refresh\" content=\"2;url=admin.php\"> ";
			else
				echo " <meta http-equiv=\"refresh\" content=\"2;url=profile.php\"> ";
			echo " </head> <body> <br> <br> <br> <br> <h4> Successfully logged in! </h4> </body>";

			$_SESSION["Username"] = $result["Username"]; //stores username in session array
			$_SESSION["Name"] = $result["Name"];
			$_SESSION["PhoneNumber"] = $result["PhoneNumber"];
			$_SESSION["ImagePath"] = $result["ImagePath"];
			
		}
		else {
			echo " <meta http-equiv=\"refresh\" content=\"2;url=project.html\">";
			echo " </head> <body> <br> <br> <br> <br> <h4> Login Failed! </h4> </body> ";
		}
			
?>
	</html>
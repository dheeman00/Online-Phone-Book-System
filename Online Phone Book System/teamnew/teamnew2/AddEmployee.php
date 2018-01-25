<?php
//start session
			session_start();
?>


<!DOCTYPE html>
<html>
	<head>
		<title> Phone Book Project </title>
		
		<style type="text/css">
		input[type=button] {
		height: 100px;      /* increase the height */
		line-height: 100px; /* vertically align the text */
		font-size: 2em;
		width: 300px;
						}
						
		body {text-align: center;
			background-color: LightBlue;
			font-size: 1.25em}
						
      </style>
		
	</head>
	<body style="text-align:center">
		<?php
			 $dscDir = 'myfiles/';
			 //$uploadFile = $dscDir . basename($_FILES['myfile']['name']);
			// $sql = " ";
		
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
			if($db_selected == true)
				{
					//print "Database Found";
					echo "<br/>";
				}
			else
				{
					print "Database not found";
					echo "<br/>";
				}
				
			if(!$db_selected)
			{
				die('Can not use' .DB_NAME. ': ' .mysql_error());
			}
			
			
			
			$uploadFile = $dscDir . basename($_FILES['myfile']['name']);
			if (file_exists($uploadFile)) 
			  {
			  }
			$value1 = $link->real_escape_string($_POST['Username']);
			$value2 = $link->real_escape_string($_POST['Password']);			
			$value3 = $link->real_escape_string($_POST['Name']);
			$value4 = $link->real_escape_string($_POST['PhoneNumber']);
			$value5 = $link->real_escape_string($_POST['Email']);
			$value7 = $link->real_escape_string($_POST['Role']);
			$value8 = $link->real_escape_string(password_hash("$value2", PASSWORD_DEFAULT));
			if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadFile))
			{
				$sql = "INSERT INTO employee (Username, Password, Name, PhoneNumber, Email, ImagePath, Role) VALUES ('$value1','$value8', '$value3', '$value4', '$value5', '$uploadFile', '$value7' )";
				mysqli_query($link, $sql);
				echo "<h1> <b>New Record Included</b> </h1>";
				echo "<br/>";
			}
			else
			{
				echo "Problem uploading";
			}
			
			/* 
			 if (file_exists($uploadFile)) 
			  {
				echo "File exists already.";
			  }
			  
			  else
		  {
			  if ($_FILES['myfile']['error'] > 0)
				  echo "Error-1 " . $_FILES['myfile']['error'] . "<br />";
			  else
			  {
				if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadFile))
				{ 
					$value1 = $link->real_escape_string($_POST['Username']);
					$value2 = $link->real_escape_string($_POST['Password']);			
					$value3 = $link->real_escape_string($_POST['Name']);
					$value4 = $link->real_escape_string($_POST['PhoneNumber']);
					$value5 = $link->real_escape_string($_POST['Email']);
					//$value6 = $link->real_escape_string($_POST['myfile']);
					$value7 = $link->real_escape_string($_POST['Role']);
					//$value4 = $link->real_escape_string($_POST['myfile']);	//need to fix this one
					//$sql = "INSERT INTO employee(Name, PhoneNumber, Email) VALUES ('$value1', '$value2', '$value3')";
					$sql = "INSERT INTO employee VALUES ('$value1','$value2', '$value3', '$value4', '$value5', '$uploadFile', '$value7' )";
					//echo "File " . $_FILES['myfile']['name'] . " uploaded. ";
					//echo "Type: " . $_FILES['myfile']['type'] . ". ";
					//echo "Size: " . ($_FILES['myfile']['size'] / 1024) . " Kb. <br />";
					//$sql3 = "INSERT INTO employee (myfile) VALUES ('','$uploadFile')";
					if(!mysqli_query($link, $sql))
					{
						die('Error-2 ' .mysql_error());
					}
				}
			  }
		  } */

			/* $value1 = $link->real_escape_string($_POST['Username']);
			$value2 = $link->real_escape_string($_POST['Password']);			
			$value3 = $link->real_escape_string($_POST['Name']);
			$value4 = $link->real_escape_string($_POST['PhoneNumber']);
			$value5 = $link->real_escape_string($_POST['Email']);
			//$value6 = $link->real_escape_string($_POST['myfile']);
			$value7 = $link->real_escape_string($_POST['Role']);
			//$value4 = $link->real_escape_string($_POST['myfile']);	//need to fix this one
			//$sql = "INSERT INTO employee(Name, PhoneNumber, Email) VALUES ('$value1', '$value2', '$value3')";
			$sql = "INSERT INTO employee VALUES ('$value1','$value2', '$value3', '$value4', '$value5', '$uploadFile', '$value7' )"; */
		/* if($link->query($sql) === TRUE)
		{
			echo "New Record Included";
			echo "<br/>";
		} */
		
		//Dispay the things from the database
		/* $sql2 = "SELECT * FROM employee";
		if(!mysqli_query($link, $sql2))
		{
			die('Error-3 ' .mysql_error());
		}
		$records = mysqli_query($link, $sql2);
		
		if(mysqli_num_rows($records) >0)
		{
			while($output = mysqli_fetch_assoc($records))
			{
				echo '<table width="30%" cellspacing="0" cellpadding="2" border="1">';
				echo "<tr>";
				echo "<td width = '50%'>" .$output['Name']. "</td>";
				echo "<td width = '50%'>" .$output['PhoneNumber']. "</td>";
				echo "<td width = '50%'>" .$output['Email']. "</td>";
				echo"</tr>";
				echo "</table>";
			}
		} */
		
		mysqli_close($link);
		?>
		
		<input id="back" style="background-color:blue" type="button" value="<---- BACK" onclick="location.href = 'admin.php';"> </input>
	</body>
</html>
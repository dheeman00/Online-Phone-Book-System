<!DOCTYPE html>
<html>
	<head>
		<title> Phone Book Project </title> 
		<style type="text/css">
			body {text-align: center;
			background-color: LightBlue;
			font-size: 1.75em}
			input[type=button] {
		height: 100px;      /* increase the height */
		line-height: 100px; /* vertically align the text */
		font-size: 2em;
		width: 300px;
						}
		</style>
	</head>
	<body>
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
			/* if($db_selected == true)
				{
					print "Database Found";
					echo "<br/>";
				}
			else
				{
					print "Database not found";
					echo "<br/>";
				} */
			
			if(!$db_selected)
			{
				die('Can not use' .DB_NAME. ': ' .mysql_error());
			}
			
			$value3 = $link->real_escape_string($_POST['Name']);
			$value4 = $link->real_escape_string($_POST['PhoneNumber']);
			
			//for deleting records
			//$sqlQuery = "DELETE FROM employee WHERE Name ='$value3' AND PhoneNumber =  $value4 ";
			//$result = mysqli_query($link,$sqlQuery);
			$sql2 = "SELECT FROM employee WHERE Name ='$value3' AND PhoneNumber =  $value4";
			$records = mysqli_query($link, $sql2);
			//echo $records;
			
			//if( mysqli_num_rows($records)==0)
				//if(sizeof($records))
			if($sql2 != NULL)
			{
				//echo "Name and Phone Number found in the database";
				echo "<br/>";
				$sqlQuery = "DELETE FROM employee WHERE Name ='$value3' AND PhoneNumber =  $value4 ";
				if(!mysqli_query($link, $sqlQuery))
				{
					echo "Name and Phone Number not found in the database!";
					echo "<br/>";
					echo "Name: ".$value3;
					echo "<br/>";
					echo "Phone: ".$value4;
					echo "<br/>";
					echo "<input id=\"back\" style=\"background-color:blue\" type=\"button\" value=\"<---- BACK\" onclick=\"location.href = 'admin.php';\"> </input> <br />";
					die('' .mysql_error());
					
				}
			
				else
				{
					echo "<br/> <br /> <br /> <h1>The contact removed successfully </h1>";
				}
			}
			
			/* else
			{
				echo "Name and Phone Number not found in the database";
				echo "<br/>";
				echo "Name: ".$value3;
				echo "<br/>";
				echo "Phone: ".$value4;
				
			} */
			
			/* if(!mysqli_query($link, $sqlQuery))
			{
				die('Error ' .mysql_error());
			}
			
			else
			{
				echo "<br/> The contact removed successfully ";
			}
			 */
			mysqli_close($link);
		?>
		<input id="back" style="background-color:blue" type="button" value="<---- BACK" onclick="location.href = 'admin.php';"> </input>
	</body>
</html>
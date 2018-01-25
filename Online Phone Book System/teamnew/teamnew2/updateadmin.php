<!DOCTYPE html>
<html>
	<head>
		<title>Display Updated Information</title>
		<!--Remember to do post and add file to 'form' tag
			--> 
		<style type="text/css">
		body {text-align: center;
			background-color: LightBlue;
			font-size: 1.75em}
		</style>
	</head>
	<body>
		<h2>Information submitted</h2>
		New Username:  <?php echo $_POST["myNewUsername"]; ?> <br/>
		Name:  <?php echo $_POST["myName"]; ?> <br />
		Phone Number:  <?php echo $_POST["myPhoneNumber"]; ?> <br />
		Email:  <?php echo $_POST["myEmail"]; ?> <br />
      <?php
		
     	 $dscDir = 'myfiles/';
		$uploadFile = $dscDir . basename($_FILES['myfile']['name']);
		echo "File Path: ".$uploadFile."<br/>"; 
		  
		  if (file_exists($uploadFile)) 
		  {
			echo "File exists already. <br/>"; 
		  }
		  else
		  {
			  if ($_FILES['myfile']['error'] > 0){
				  
				  echo "Error: " . $_FILES['myfile']['error'] . "<br />";
				  exit("Failed to update file and database update was aborted!!! <br/>");
			  }
			  else
			  {
				if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadFile))
				{ 
					echo "File uploaded: " . $_FILES['myfile']['name'];
					echo "<br/>  File Type: " . $_FILES['myfile']['type'] . ". ";
					echo "<br/>  File Size: " . ($_FILES['myfile']['size'] / 1024) . " Kb. <br />";
				}
			  }
		  }

         require "MyDB.php";
         
		 $usernameold = $_POST["myUsername"];
		 $usernamenew = $_POST["myNewUsername"];
		 
		 // connect to database books
		 $myDB = new MyDB("PHONEBOOK");
		 
		 $value2 = $_REQUEST['myPassword'];
		 $value8 = password_hash("$value2", PASSWORD_DEFAULT);
	    
         // build UPDATE query
		 $query = "UPDATE EMPLOYEE SET Username = '$usernamenew', Name='". $_REQUEST['myName']. 
			  "',PhoneNumber='".$_REQUEST['myPhoneNumber'].
			  "', Email = '".$_REQUEST['myEmail']. "', Password = '"."$value8"."', ImagePath='$uploadFile'".
			  " WHERE Username ='$usernameold'  LIMIT 1";	               

		 $myDB->updateQuery($query);
         
         print ("<h3>Record is updated successfully ! <br /> </h3>");
         
         $myDB->closeDB(); 
      ?>
		
	</body>
</html>

    
<?php
			session_start();//start session variable
?>

<!DOCTYPE html>
<html lang = "en">
   <head>
      <title>University Feedback</title>
	  <meta charset = "utf-8" />
      <style type="text/css">
	  body {text-align: center;
			background-color: LightBlue;
			font-size: 1.75em}
	
	  input[type=button] {
		height: 100px;      /* increase the height */
		line-height: 100px; /* vertically align the text */
		font-size: 1em;
		width: 400px;
		background-color: green;
		color : white;
		font-family: italic;
						}
	   input[type=submit] {
		height: 50px;      /* increase the height */
		line-height: 50px; /* vertically align the text */
		font-size: 1.25em;
		width: 150px;
						}
	  
      </style>
	  
	 <script type="text/javascript">
	 
	 var msg ="";
					
	function isEmpty(obj)
	{
		obj.value = obj.value.trim();
		if (obj.value == null || obj.value == "")
		{
		   if (msg == "")
				msg = obj.name;		
		   else
			msg = msg + " , " + obj.name;
		  
		   return true;
		}
		return false;
	}
	   function toggle_visibility(id) {
		   var e = document.getElementById(id);
		   if(e.style.display == 'initial')
			  e.style.display = 'none';
		   else 
			  e.style.display = 'initial';
	   }
	   
	  
		function validateSearchEmployee()
		{
			// Validates all fields necessary are filled in when searching for an employee
			// Display error message underneath SearchEmployee form
			var result1 = true;
			var result2 = true;
			var obj_arr = ["SearchName","SearchPhoneNumber"];
		   
			result1 = !isEmpty(document.getElementsByName(obj_arr[0])[0]) && result1;                
			result2 = !isEmpty(document.getElementsByName(obj_arr[1])[0]) && result2; 
			if (!result1 && !result2)
			   msg = "At least one of the following must be filled: " + msg + ". ";
							   
			document.getElementById("errormsg").innerHTML = msg;
					   
			return result;
			
		}

		function validateUpdateInfo()
		{
			// Validates all fields necessary are filled in an employee updates his/her own information
			// Display error message underneath AddEmployee form
			
			!isEmpty(document.getElementsByName(obj_arr[0])[0]) && result1; 
			
			var result1 = true;
			var result2 = true;
			var result3 = true;
			var result4 = true;
			var result5 = true;
			var result6 = true;
			var obj_arr = ["UpdateName","UpdatePhoneNumber","UpdateEmail","UpdateImagePath","UpdatePassword","UpdateRole"];
			
			
		   
			result1 = !isEmpty(document.getElementsByName(obj_arr[0])[0]);                
			result2 = !isEmpty(document.getElementsByName(obj_arr[1])[0]); 
			result3 = !isEmpty(document.getElementsByName(obj_arr[2])[0]);
			result4 = !isEmpty(document.getElementsByName(obj_arr[3])[0]); 
			result5 = !isEmpty(document.getElementsByName(obj_arr[4])[0]); 
			result6 = !isEmpty(document.getElementsByName(obj_arr[5])[0]); 

			if (!result)
			   msg = "The following field(s) should not be empty: " + msg + ". ";
							   
			document.getElementById("errormsg").innerHTML = msg;
					   
			return result;
		}


	</script>
	  
   </head>

   <body>
      <h1> <strong>Team New</strong> Phonebook System</h1>
	  
	  <br />
	  <br />
	  
	  <table border="1" align="center">
		
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Phone Number</th>
				<th>Image</th>
			</tr>
		
		<tbody>
			<tr>
			
	  <?php
		echo " <td>";
		echo $_SESSION['Username'];
		echo " </td>";
		
		echo "<td>";
		echo $_SESSION['Name'];
		echo "</td>";
		echo "<td>";
		echo $_SESSION["PhoneNumber"];
		echo "</td>";
		echo "<td>";
		$variabl = $_SESSION['ImagePath'];
		echo "<img src='$variabl' alt='Employee Image' style='width:150px;height:150px;'>";
		echo "</td>";
	  
	  
	  ?>
		</tr>
	  </tbody>
	  </table>
	  
	  <br /> 
	  <br />

      <h2> Available operations: </h2>
	  
	 
	  <input id="btnAccount" type="button" value="Edit Account Information" onclick="location.href = 'ViewUpdatePersonal.php';" > </input>   <br /> <br />
		
	  <input id="btnSearchEmployee" type="button" value="Search Employee" onclick="location.href = 'searchE.html';"> </input>   <br /> <br />
	  
	  <input id="Logout" style="background-color:blue" type="button" value="Logout" onclick="location.href = 'project.html';"> </input>
	  
	  <?php
		$_SESSION["url"] = "profile.php";
	 ?>
      
   </body>
</html>

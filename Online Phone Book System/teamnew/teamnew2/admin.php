<?php
//start session
			session_start();
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
		background-color: red;
		color : white;
		font-family: italic;
						}
	   input[type=submit] {
		height: 50px;      /* increase the height */
		line-height: 50px; /* vertically align the text */
		font-size: 1.25em;
		width: 150px;
						}
		form { 
		margin: 0 auto; 
		width:450px;
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
	   
	   function validateAddEmployee()
		{
			// Validates all fields necessary are filled in when adding an employee
			// Display error message underneath AddEmployee form
			msg = "";
			var result = true;
			var result2 = true;
			var obj_arr = ["Username","PhoneNumber","Email","Name","Password"];
		   
			for (var i = 0; i<5; i++) 
			{
			   result = !isEmpty(document.getElementsByName(obj_arr[i])[0]) && result; 
			   if(isEmpty(document.getElementsByName(obj_arr[i])[0]))
			   {
				document.getElementsByName(obj_arr[i])[0].style.borderColor = "red";
				result = false;
			   }
			   
			} 
			
			

			var element = document.getElementById('ifile');
			if (element.type=="file")
			{
				var sFileName = element.value;
				if (sFileName.length > 0) 
				{
					
				}
				else {
					msg += "Please provide a file to upload. ";
					result2 = false;
					}
			}

			if (!result) 
			   msg = " Please fill out the required fields. "
			if (!result2)
			   msg += " Please provide a file to upload. ";
		   
							   
			document.getElementById("errormsg").innerHTML = msg;
					   
			return result;
		}

		function validateEditEmployee()
		{
			// Validates all fields necessary are filled in when editing an employee
			// Display error message underneath EditEmployee form
			
			var result = true;
			var obj_arr = ["EditName","EditPhoneNumber","EditEmail","EditImagePath","EditPassword"];
		   
			for (var i = 0; i<5; i++) 
			{
			   result = !isEmpty(document.getElementsByName(obj_arr[i])[0]) && result; 
			   if(isEmpty(document.getElementsByName(obj_arr[i])[0]))
			   {
					if (i == 0 || i == 1)
						document.getElementsByName(obj_arr[i])[0].style.borderColor = "red";
			   }
			} 
			if (!result)
			   msg = "Please fill out the required fields."
		   
							   
			document.getElementById("errormsg2").innerHTML = msg;
			return result;
		}

		function validateRemoveEmployee()
		{
			// Validates all fields necessary are filled in when removing an employee
			// Display error message underneath RemoveEmployee form
			
			var result = true;
			var obj_arr = ["RemoveName","RemovePhoneNumber"];
		   
			for (var i = 0; i<2; i++) 
			{
			   result = !isEmpty(document.getElementsByName(obj_arr[i])[0]) && result; 
			   if(isEmpty(document.getElementsByName(obj_arr[i])[0]))
			   {
					
					document.getElementsByName(obj_arr[i])[0].style.borderColor = "red";
			   }
			} 
			if (!result)
			   msg = "Please fill out the required fields."
							   
			document.getElementById("errormsg3").innerHTML = msg;
					   
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
	  
	  
	  <input id="btnAddEmployee" type="button" value="Add Employee" onclick=" return toggle_visibility('addform');" > </input>  <br /> <br />
	  <div id="addform" style="display:none">
	  
	  <form method = "POST" action = "AddEmployee.php" onsubmit="return validateAddEmployee()" enctype="multipart/form-data">
		<p>
			<label> Username:
				<input type = "text" name = "Username" size = "50" />
			</label>
		</p>
		<p>
			<label> Password:
				<input type = "password" name = "Password" size = "50" />
			</label>
		</p>
		<p>
			<label> Name:
				<input type = "text" name = "Name" size = "50" />
			</label>
		</p>
		<p>
			<label> Phone Number:
				<input type = "number" name = "PhoneNumber" size = "50" />
			</label>
		</p>
		<p>
			<label> Email:
				<input type = "email" name = "Email" size = "50" />
			</label>
		</p>
		<p>
			<label> Image:
				<input type = "file" id="ifile" name = "myfile"  accept = "image/*"/>
			</label>
		</p>
		<p>
			<label> Role:
			
				<select name = "Role">
					<option value="User">User</option>
					<option value="Admin">Admin</option>
				</select>
			</label>
		</p>
		
		<input type = "submit" class = "submit" value = "Submit" /> <br /> <br />
		
		<div class="msg" style="color:RED">
						<label id="errormsg"></label>
		</div>
		
		<br />
		</form>
	  
	  </div>
	 
		 
		 <input id="btnEditEmployee" style="background-color:green" type="button" value="Remove Employee" onclick="location.href = 'RemoveEmployee.php';"> </input>   <br /> <br />
		 
		 <input id="btnEditEmployee" style="background-color:green" type="button" value="Edit Employee" onclick="location.href = 'ViewUpdateAdmin.php';"> </input>   <br /> <br />
		 
		 <input id="btnAccount" style="background-color:green" type="button" value="Edit Account Information" onclick="location.href = 'ViewUpdatePersonal.php';" > </input>   <br /> <br />
		
	     <input id="btnSearchEmployee" style="background-color:green" type="button" value="Search Employee" onclick="location.href = 'searchE.html';"> </input>   <br /> <br />
		 
		 <input id="Logout" style="background-color:blue" type="button" value="Logout" onclick="location.href = 'project.html';"> </input>
		 
		 <?php
			$_SESSION["url"] = "admin.php";
		 ?>
   </body>
</html>

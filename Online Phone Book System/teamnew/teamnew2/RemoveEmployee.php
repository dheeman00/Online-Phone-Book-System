<!DOCTYPE html>
<html lang = "en">
	<head>
		<title> Phone Book Project </title>
		<style type="text/css">
			body {background-color: LightBlue}
		</style>
		
		<script type="text/javascript">
		var msg = "";
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
			function validateRemoveEmployee()
		{
			// Validates all fields necessary are filled in when removing an employee
			// Display error message underneath RemoveEmployee form
			
			var result = true;
			var obj_arr = ["Name","PhoneNumber"];
		   
			for (var i = 0; i<2; i++) 
			{
			   result = !isEmpty(document.getElementsByName(obj_arr[i])[0]) && result; 
			   if(isEmpty(document.getElementsByName(obj_arr[i])[0]))
			   {
					
					document.getElementsByName(obj_arr[i])[0].style.borderColor = "red";
					result=false;
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
		<form action = 'After_remove.php' method = 'post' onsubmit=" return validateRemoveEmployee()">
			<br/>
			<b>Please enter the information about the Employee to be removed: </b><br/><br/>
			<b> Name: </b>
			<input type = 'text' name = 'Name' size = '50' /> <br/> <br/>
			<b> Phone: </b>
			<input type = 'tel' name = 'PhoneNumber' maxlength = '10' size = '50'/> <br/> <br/>
			<br />
			<div class="msg" style="color:RED">
						<label id="errormsg3"></label>
			</div>
			<br />
			<input type = 'submit' value = 'Remove Contact' />
		</form>
	</body>
</html>
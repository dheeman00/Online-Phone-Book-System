   
function isEmpty(obj)
{
	var msg;
         
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

function validateLogin()
{
	var msg;
         
	// Validates that username and password fields aren't empty
	// Display error message underneath login form
	msg = "";
                           
    var result = true;
    var obj_arr = ["username","password"];
   
    for (var i = 0; i<2; i++) 
 	   result = !isEmpty(document.getElementsByName(obj_arr[i])[0]) && result;                

    if (!result)
	   msg = "The following field(s) should not be empty: " + msg + ". ";
					   
    document.getElementById("errormsg").innerHTML = msg;
			   
    return result;       
	
}

function validateAddEmployee()
{
	// Validates all fields necessary are filled in when adding an employee
	// Display error message underneath AddEmployee form
	
	var result = true;
    var obj_arr = ["Name","PhoneNumber","Email","ImagePath","Username","Password","Role"];
   
    for (var i = 0; i<2; i++) 
 	   result = !isEmpty(document.getElementsByName(obj_arr[i])[0]) && result;                

    if (!result)
	   msg = "The following field(s) should not be empty: " + msg + ". ";
					   
    document.getElementById("errormsg").innerHTML = msg;
			   
    return result;
}

function validateEditEmployee()
{
	// Validates all fields necessary are filled in when editing an employee
	// Display error message underneath EditEmployee form
	
	var result = true;
    var obj_arr = ["Name","PhoneNumber","Email","ImagePath","Password","Role"];
   
    for (var i = 0; i<2; i++) 
 	   result = !isEmpty(document.getElementsByName(obj_arr[i])[0]) && result;                

    if (!result)
	   msg = "The following field(s) should not be empty: " + msg + ". ";
					   
    document.getElementById("errormsg").innerHTML = msg;
			   
    return result;
}

function validateRemoveEmployee()
{
	// Validates all fields necessary are filled in when removing an employee
	// Display error message underneath RemoveEmployee form
	
	var result = true;
    var obj_arr = ["Name","PhoneNumber"];
   
    for (var i = 0; i<2; i++) 
 	   result = !isEmpty(document.getElementsByName(obj_arr[i])[0]) && result;                

    if (!result)
	   msg = "The following field(s) should not be empty: " + msg + ". ";
					   
    document.getElementById("errormsg").innerHTML = msg;
			   
    return result;
}

function validateSearchEmployee()
{
	// Validates all fields necessary are filled in when searching for an employee
	// Display error message underneath SearchEmployee form
	var result1 = true;
	var result2 = true;
    var obj_arr = ["Name","PhoneNumber"];
   
    result1 = !isEmpty(document.getElementsByName(obj_arr[0])[0]) && result1;                
	result2 = !isEmpty(document.getElementsByName(obj_arr[1])[0]) && result1; 
    if (!result1 && !result2)
	   msg = "At least one of the following be filled: " + msg + ". ";
					   
    document.getElementById("errormsg").innerHTML = msg;
			   
    return result;
	
}

function validateUpdateInfo()
{
	// Validates all fields necessary are filled in an employee updates his/her own information
	// Display error message underneath AddEmployee form
	
	!isEmpty(document.getElementsByName(obj_arr[0])[0]) && result1; 
	
	var result = true;
    var obj_arr = ["Name","PhoneNumber","Email","ImagePath","Password","Role"];
   
    for (var i = 0; i<2; i++) 
 	   result = !isEmpty(document.getElementsByName(obj_arr[i])[0]) && result;                

    if (!result)
	   msg = "The following field(s) should not be empty: " + msg + ". ";
					   
    document.getElementById("errormsg").innerHTML = msg;
			   
    return result;
}
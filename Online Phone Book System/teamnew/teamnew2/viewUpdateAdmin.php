<!DOCTYPE html>
<!-- Querying a database and displaying the results. -->
<html lang = "en">
   <head>
      <title>Update Employee Information (Only Admin)</title>
	  <meta charset = "utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <style type="text/css">
      em {font-weight: bold;
      	  font-style: normal}
		body {
		   padding-left: 100px;
		   padding-right: 100px;
			background-color: LightBlue;
			font-size: 1.75em
		   }
      </style>


   </head>
   <body>
   		<script> 
function confirmation1()
 { 
	var displaymsg = "Are you sure you want to reset the form?";
	return (confirm(displaymsg));
 }	
 function hello()
 {
	 alert('hello');
 }
 function displaySubmitMessage(boolv){
	if(!boolv)
		confirm("Please fill out all of the fields before submitting the form.");
	return boolv; 
 }
 function CheckForm()
 {
 //highlight missing fields
	if(document.getElementById("1").value == "")
		return false;
	return true; 

 }
 function loadDoc(url, cfunc, str) {
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      cfunc(xhttp);
    }
  };
  xhttp.open("POST", url+"?"+str, true);
  xhttp.send();
}
function myFunctionUpdateDiv(xhttp) {
  document.getElementById("2").innerHTML = xhttp.responseText;
}
		
        </script>
		       <h1>Update Employee Records</h1>

      <form  enctype="multipart/form-data"  onreset="return confirmation1()">
			<h2>Search by UserName</h2>
			<p ><label  >Username (search Criteria for edit employee Record): </label>
              
				<a href="#" data-toggle="tooltip" title="UserName is the search criteria">
				<input  id="1" class="form-control" type="text" value="" name="Username" size="25" maxlength="35"/>
				</a><br/><br/>
         </p>

		 

		 
         <p>
            <input type = "button" value = "Submit" onclick="return displaySubmitMessage(CheckForm()) && loadDoc('searchViewUpdateAdmin.php', myFunctionUpdateDiv, $('#1').serialize())" />
            <input type = "reset" value = "Reset" />
         </p>  		 
      </form>
	  
	  <div id="2">
	  </div>

   </body>
</html>

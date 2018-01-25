<?php
//start session
			session_start();
?>
<!DOCTYPE html>
<!-- Querying a database and displaying the results. -->
<html lang = "en">
   <head>
      <title>Update Personal Information</title>
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
		   }
      </style>
   </head>
   <body>
      <?php
		require "MyDB.php";
         
		// connect to database books
		$myDB = new MyDB("PHONEBOOK");
		
		 //grab username from session array
		 $Username = $_SESSION["Username"];
		
		// build SELECT query
		$where = "";
		$where = condition($where, $Username, " Username LIKE '%$Username%'");
	 
		if (!empty($where))
			$where = " WHERE ".$where . " LIMIT 1";
	 
	 
         $query = "SELECT Name, PhoneNumber, Email, ImagePath, Password FROM EMPLOYEE".$where;        	   

         // query database
		 $results = $myDB->selectQuery($query);     
      ?>
      
         <?php  
            // Results of current information
			$counter = 0;
			$counter2 = 0; 
			$myName =""; $myEmail =""; $myPhoneNumber =""; $myImagePath =""; $myPassword=""; 
			foreach ($results as $k =>$row)
			{
			   if (is_array($row) || is_object($row))
			   {
				   
				   foreach($row as $value){
					   if($counter2 == 0)
						   $myName = $value;
					   else if ($counter2 == 2)
						  $myEmail = $value;
					   else if($counter2 == 1)
						  $myPhoneNumber = $value;
					   else if ($counter2 == 4)
						   $myPassword = $value;
					   else if ($counter2 == 3)
						  $myImagePath = $value; 
 
					   ++$counter2;
				   }
						
				   $counter++;
			   }
            } 
           $myDB->closeDB();
		   print("<br />Your search yielded ".$counter." results.<br /><br />");
         ?>
		 
		       <h1>Update Personal Information</h1>

      <form  action="updatepersonal.php" method="POST" enctype="multipart/form-data" onsubmit="return displaySubmitMessage(CheckForm())" onreset="return conf()">
         <p ><label  >Name: </label>
              
				<a href="#" data-toggle="tooltip" title="Please enter name">
				<input  id="1" class="form-control" type="text" value="<?php echo htmlspecialchars( $myName);?>" name="myName" size="25" maxlength="35"/>
				</a>
         </p>
         

         <!-- textbox whose display is masked with -->
         <!-- asterisk characters -->
         <p class="form-group"><label >Phone Number:</label>
            
			<a href="#" data-toggle="tooltip" title="Please enter your phone number"> <input  value="<?php echo htmlspecialchars(  $myPhoneNumber); ?>" id="2" class="form-control" type="number" name = "myPhoneNumber" size = "12" /></a>
         </p> 
 
          <p class="form-group"><label id="33">Email: </label> 
           
			<a href="#" data-toggle="tooltip" title="Please enter your preferred email addresss">
				<input id="3"  value="<?php echo htmlspecialchars( $myEmail );?>"  class="form-control" type="email" name = "myEmail" size = "25" />
			</a>
         </p> 

		 

		 <p>
		 <a href="#" data-toggle="tooltip" title="only images will be accepted"><input type="file" name="myfile" accept="image/*"/><!-- this will filter files --></a>
		<div>Current File Path: <?php echo htmlspecialchars( $myImagePath) ?></div>
		 </p>
		 <p/><label>Password</label><input type = "password" id="4" value="<?php echo htmlspecialchars( $myPassword); ?>" name="myPassword"/>
		 
		 <script type="text/javascript" file="TeamNewJs/updatepersonal.js">
		<script type="text/javascript"> 
function conf()
 { 
	var displaymsg = "Are you sure you want to reset the form?"
	return (confirm(displaymsg));
 }	
 function displaySubmitMessage(boolv){
	if(!boolv)
		confirm("Please fill out all of the fields before submitting the form.");
	return boolv; 
 }
 function CheckForm()
 {
 //highlight missing fields
	if(document.getElementById("1").value == 0)
		document.getElementById("1").style.backgroundColor = "#FDFF47";
	if(document.getElementById("2").value == 0)
		document.getElementById("2").style.backgroundColor = "#FDFF47";
	if(document.getElementById("3").value == 0)
		document.getElementById("3").style.backgroundColor = "#FDFF47";
		

	
	var checkBoxes = document.getElementsByName("webpro[]");
	var answered = false; 
	for (var i = 0; i < checkBoxes.length; i++)
	{   
		if (checkBoxes[i].checked)
			answered = true; 
	}
	if(!answered)
		checkBoxes[0].parentElement.parentElement.style.backgroundColor = "#FDFF47";
		
	var x = document.getElementById("myFile");
	var txt = "";
	if ('files' in x) {
		if (x.files.length == 0) {
			x.parentElement.parentElement.style.backgroundColor = "#FDFF47";
			return false; 
		}
	}
	return answered; 
 }
 
		
        </script>
		 
         <p>
            <input type = "submit" value = "Submit" />
            <input type = "reset" value = "Reset" />
         </p>  		 
      </form>
	  

   </body>
</html>

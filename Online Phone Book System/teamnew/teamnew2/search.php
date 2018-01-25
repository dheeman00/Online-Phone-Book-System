<?php
//start session
			session_start();
?>
<!DOCTYPE html>
<!-- Querying a database and displaying the results. -->
<html lang = "en">
   <head>
      <title>Search Results</title>
      <style type = "text/css">
         body  { font-family: arial, sans-serif;
                 background-color: #F0E68C } 
         table { background-color: #ADD8E6 }
         td    { padding-top: 2px;
                 padding-bottom: 2px;
                 padding-left: 4px;
                 padding-right: 4px;
                 border-width: 1px;
                 border-style: inset }
		
      </style>
   </head>
   <body>
      <?php
		require "MyDB.php";
         
		// connect to database books
		$myDB = new MyDB("PHONEBOOK");
		
		// build SELECT query
		$where = "";
		$where = condition($where, $_REQUEST['name'], " Name LIKE '%".$_REQUEST['name']."%'");
		$where = condition($where, $_REQUEST['phonenumber'], " PhoneNumber LIKE '%".$_REQUEST['phonenumber']."%'");
	 
		if (!empty($where))
			$where = " WHERE ".$where;
	 
		$columns = "";
		$tableh = "";
		$count = 0; 
		$imagelocation =""; 
		foreach ($_REQUEST['fields'] as $key=>$value)
		{ 	
			++$count;
			$tval = "<th>$value</th>";
			if($value == "imagepath")
				$imagelocation = $count; 
			if (empty($columns))
			{
			   $columns = $value;
			   $tableh = $tval;
			}
			else
			{
			   $columns = $columns.",".$value;
			   $tableh = $tableh.$tval;
			}
		 }
	 
         $query = "SELECT " .$columns. " FROM EMPLOYEE
         	   ".$where;        	   

         // query database
		 $results = $myDB->selectQuery($query);     
      ?>
      
      <h3>Search Results</h3>
         <?php  
            // fetch each record in result set
			$counter = 0;
			print("<table><tr>".$tableh."</tr>");
			foreach ($results as $k =>$row)
			{
               // build table to display results
               print( "<tr>" );
			   if (is_array($row) || is_object($row))
			   {
				   $count1 =0; 
				   foreach ($row as $value) {
						++$count1; 

						if($count1 == $imagelocation)//if it's an image, display the image
						{
							print( "<td><img src='$value' alt='Employee Image' style='width:150px;height:150px;'></td>" ); 
						}
						else{
							print("<td>$value</td>"); 
						}
				   }
				   print( "</tr>" );
				   $counter++;
			   }
            } 
           print("</table>");
           $myDB->closeDB();
		   print("<br />Your search yielded ".$counter." results.<br /><br />");
         ?>
		 
		 <input id="back" style="background-color:blue" type="button" value="<---- BACK" onclick="location.href = '<?php echo $_SESSION['url']; ?>';"> </input>
   </body>
</html>

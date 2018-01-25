           function validationFields()
            {
               var obj1 = document.getElementsByName("fields[]");
               var i = 0;
               
               var sel = false;
			   
               while (!sel && (i < obj1.length))   
			   {  if (obj1[i++].checked)
					  sel = true;
			   }
					   
			   if (!sel)
				 document.getElementById("errormsg").innerHTML = "Please select field(s)";
							   
			   return sel;       
		   } 
		   function completeAjaxPost(buttonId, formId, phpFile, responseDiv )
		   {
					showajaxpage($('#' + formId).serialize(), phpFile, responseDiv); 
				
		   }

		$(document).ready(function(){
	    $("#button1").click(function(){
        //$(this).hide();
		if(validationFields()){
			showajaxpage($('#form1').serialize(), 'search.php', 'responsediv'); 
		}
		});
		});
	 /*$('#form1').submit(function() { -->
    // get all the inputs into an array.
    var newinputs = $('#form1').serializearray();
	alert(newinputs);
 
	});*/
		function showajaxpage(str, phpfile, responsediv) {
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			  document.getElementById(responsediv).innerHTML=xmlhttp.responseText;
			}
		  }
		  
		  xmlhttp.open("POST",phpfile + "?"+str,true);
		  xmlhttp.setRequestHeader("Content-type", "text/html");
		  xmlhttp.send();
		}
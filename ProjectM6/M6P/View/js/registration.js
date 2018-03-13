
  
function formValidation()  
{  

error="";
var firstname = document.getElementById('txt_FirstName').value;
alert(firstname);
var lastname = document.getElementById('txt_LastName').value; 
alert(lastname);
var uemail = document.getElementById('txt_Email').value; 
alert(uemail);
var upass = document.getElementById('txt_password').value; 
alert(upass);
var ujob = document.getElementById('txt_Job').value;
alert(1);
var ucompanyname = document.getElementById('txt_CompanyName').value; 
alert("hai");
var ucity = document.getElementById('txt_City').value; 
alert("hai");
var ucountry = document.getElementById('txt_Country').value;
alert("5");
alert(lastname);
if(allLetter(firstname))  
{  
if(allLetter(lastname))  
{  
if(ValidateEmail(uemail))  
{ 
if(passid_validation(upass,7,12))  
{  
if(allLetter(ujob))  
{  
if(allLetter(ucompanyname))  
{   
if(allLetter(ucity))  
{  
if(allLetter(ucountry))  
{  
  
}  
}   
}  
}   
}  
}  
}  
}  
return false;  
  
} 
function allLetter(firstname)  
{   
	var letters = /^[A-Za-z]+$/; 
	var firstname_length = firstname.length;
	if((firstname == "" )||(firstname.length == 0))
	{ alert("empty");
	  document.getElementById('err').innerHTML =  "Please enter the value";
	  return false;	
	}
	if(firstname_length > 30)  
	{   alert(firstname_length);
		document.getElementById('err').innerHTML =" Length of should be only 30 character";  
		return false;
	 
	} 
	if(firstname.match(letters))  
	{  
	  return true;  
	}   
	else  
	{  
		document.getElementById('err').innerHTML ="Aphabet characters only allowed in this field";  
		return false;  
	}  
}  
function passid_validation(passid,mx,my)  
{  
	var passid_len = passid.value.length;  
	if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
	{  
	document.getElementById('err').innerHTML ="Password should not be empty / length be between "+mx+" to "+my";  
	return false;  
	}  
	return true;  
}  


function ValidateEmail(uemail)  
{  
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
	if(uemail.match(mailformat))  
	{  
	return true;  
	}  
	else  
	{  
	document.getElementById('err').innerHTML ="You have entered an invalid email address!";  
	return false;  
	}  
} 
}
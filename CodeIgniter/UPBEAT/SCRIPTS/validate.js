function validateForm()
{
	if(checkValue(upfname)&&
	checkValue(uplname)&&
	checkValue(upuname)&&
	checkValue(upaddress)&&
	checkValue(upcontact)&&
	checkValue(upemail)&&
	checkValue(upconemail)&&
	checkValue(upword)&&
	checkValue(upconpword)){ checkValue.submit();}

	else
	{
		checkValue(upfname);
		checkValue(uplname);
		checkValue(upuname);
		checkValue(upaddress);
		checkValue(upcontact);
		checkValue(upemail);
		checkValue(upconemail);
		checkValue(upword);
		checkValue(upconpword);

		return false;
	}
}


function checkValue(field1)
{
	var x=document.forms["signup"]["upword"].value;
	var y=document.forms["signup"]["upconpword"].value;
	var e=document.forms["signup"]["upemail"].value;
	var atpos=e.indexOf("@");
	var dotpos=e.lastIndexOf(".");

	if(field1.value==null || field1.value=="")
	{
		chooseError(field1);
		return false;
	}
	else if(field1.value!=null || field1.value!="")
	{
		clearError(field1);
		return true;
	}
	else if(x!=y)
	{
		document.getElementById("conpasserror").innerHTML = "Passwords did not match!";
		return false;
	}
	else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=e.length)
	{
		document.getElementById("emailerror").innerHTML = "Invalid E-mail Address";
		return false;
	}
	else { return true; }
}

function clearError(field1)
{
	if(field1==upfname) {
		document.getElementById("fnameerror").innerHTML = "";
	} if(field1==uplname) {
		document.getElementById("lnameerror").innerHTML = "";
	} if(field1==upuname) {
		document.getElementById("unameerror").innerHTML = "";
	} if(field1==upaddress) {
		document.getElementById("addresserror").innerHTML = "";
	} if(field1==upcontact) {
		document.getElementById("contacterror").innerHTML = "";
	} if(field1==upemail) {
		document.getElementById("emailerror").innerHTML = "";
	} if(field1==upconemail) {
		document.getElementById("conemailerror").innerHTML = "";
	} if(field1==upword) {
		document.getElementById("passerror").innerHTML = "";
	} if(field1==upconpword) {
		document.getElementById("conpasserror").innerHTML = "";
	}
}

function chooseError(field1)
{
	if(field1==upfname) {
		document.getElementById("fnameerror").innerHTML = "Empty First Name";
	} if(field1==uplname) {
		document.getElementById("lnameerror").innerHTML = "Empty Last Name";
	} if(field1==upuname) {
		document.getElementById("unameerror").innerHTML = "Empty Username";
	} if(field1==upaddress) {
		document.getElementById("addresserror").innerHTML = "Empty Mailing Address";
	} if(field1==upcontact) {
		document.getElementById("contacterror").innerHTML = "Empty Contact Number";
	} if(field1==upemail) {
		document.getElementById("emailerror").innerHTML = "Empty E-mail Address";
	} if(field1==upconemail) {
		document.getElementById("conemailerror").innerHTML = "Must Confirm E-mail Address";
	} if(field1==upword) {
		document.getElementById("passerror").innerHTML = "Empty Password";
	} if(field1==upconpword) {
		document.getElementById("conpasserror").innerHTML = "Must Confirm Password";
	}
}
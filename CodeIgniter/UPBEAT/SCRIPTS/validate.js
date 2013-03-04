function validateForm()
{
	var i;
	var j;
	var k;
	var l;
	var fcount;
	var lcount;
	var ccount;
	var number = "0123456789";
	var alpha = "abcdefghijklmnopqrstuvwxyz ";
	var upuname = document.forms["signupform"]["upuname"].value;
	var upfname = document.forms["signupform"]["upfname"].value;
	var uplname = document.forms["signupform"]["uplname"].value;
	var upemail = document.forms["signupform"]["upemail"].value;
	var uppword = document.forms["signupform"]["upword"].value;
	var address = document.forms["signupform"]["upaddress"].value;
	var contact = document.forms["signupform"]["upcontact"].value;
	var reemail = document.forms["signupform"]["upconemail"].value;
	var repword = document.forms["signupform"]["upconpword"].value;

	fcount = checkInvalid(upfname,alpha);
	lcount = checkInvalid(uplname,alpha);
	ccount = checkInvalid(contact,number);

	if (fcount != upfname.length) { document.getElementById("filluperror").innerHTML = "First name contains an invalid character!";}
	else if (lcount != uplname.length) { document.getElementById("filluperror").innerHTML = "Last name contains an invalid character!";}
	else if (ccount != 10) { document.getElementById("filluperror").innerHTML = "Please enter an 11-digit contact number!";}
	else if (upemail != reemail){ document.getElementById("filluperror").innerHTML = "Email addresses do not match";}
	else if (uppword != repword){ document.getElementById("filluperror").innerHTML = "Passwords do not match";}
	else return true;

	if (!upuname || !upfname || !uplname || !upemail || !uppword || !address || !contact || !reemail || !repword) 
	{
		document.getElementById("filluperror").innerHTML = "Please complete all fields!";
	}

	return false;
}

function checkInvalid(nvalue,compare)
{
	var i;
	var j;
	var count = 0;

	for (i = 0; i < nvalue.length; i++)
		for (j = 0; j < compare.length; j++)
			if (nvalue[i].toLowerCase() == compare[j]) count++;

	return count;
}

function validateLogin()
{
	var uname = document.forms["loginform"]["uname"].value;
	var pword = document.forms["loginform"]["pword"].value;

	if (!uname && pword){ document.getElementById("fillerror").innerHTML = "Please fill in username!";}
	else if (uname && !pword){ document.getElementById("fillerror").innerHTML = "Please enter password!";}
	else if (!uname && !pword){ document.getElementById("fillerror").innerHTML = "Please enter username and password!";}
	else if (uname && pword){ return true;}
	return false;
}

function validEdit()
{
	var count;
	var error = 0;
	var number = "0123456789";
	var alpha = "abcdefghijklmnopqrstuvwxyz ";
	var fname = document.forms["editaccount"]["acfname"].value;
	var lname = document.forms["editaccount"]["aclname"].value;
	var uname = document.forms["editaccount"]["acuname"].value;
	var email = document.forms["editaccount"]["acemail"].value;
	var address = document.forms["editaccount"]["acaddre"].value;
	var contact = document.forms["editaccount"]["acconta"].value;
	var current = document.forms["editaccount"]["acpword"].value;
	var newcontact = document.forms["editaccount"]["acnewword"].value;
	var concontact = document.forms["editaccount"]["acconpword"].value;
	var hiddenpword = document.forms["editaccount"]["hidepword"].value;

	if (!fname){ document.getElementById("editfname").innerHTML = "* Please fill in first name!"; error = 1;}
	else
	{
		count = checkInvalid(fname,alpha);
		if (count != fname.length){ document.getElementById("editfname").innerHTML = "* There's an invalid character!"; error = 1;}
		else{ document.getElementById("editfname").innerHTML = "";}
	}

	if (!lname){ document.getElementById("editlname").innerHTML = "* Please fill in last name!"; error = 1;}
	else
	{
		count = checkInvalid(lname,alpha);
		if (count != lname.length){ document.getElementById("editlname").innerHTML = "* There's an invalid character!"; error = 1;}
		else{ document.getElementById("editlname").innerHTML = "";}
	}

	if (!uname){ document.getElementById("edituname").innerHTML = "* Please fill in username!"; error = 1;}
	if (!email){ document.getElementById("editemail").innerHTML = "* Please fill in email address!"; error = 1;}
	if (!address){ document.getElementById("editaddress").innerHTML = "* Please fill in address!"; error = 1;}
	if (!contact){ document.getElementById("editcontact").innerHTML = "* Please fill in contact number!"; error = 1;}
	else
	{
		count = checkInvalid(contact,number);
		if (count != 10){ document.getElementById("editcontact").innerHTML = "* Enter an 11-digit number!"; error = 1;}
		else{ document.getElementById("editcontact").innerHTML = "";}
	}

	if (!current){ document.getElementById("editpword").innerHTML = "* Please fill in password!"; error = 1;}
	else if (current != hiddenpword){ document.getElementById("editpword").innerHTML = "* Password invalid!"; error = 1;}
	else{ document.getElementById("editpword").innerHTML = "";}

	if (!newcontact){ document.getElementById("editnewword").innerHTML = "* Please fill in new password!"; error = 1;}
	else { document.getElementById("editnewword").innerHTML = "";}

	if (!newcontact && !concontact){ document.getElementById("editconpword").innerHTML = ""; error = 1;}
	else if (newcontact && !concontact){ document.getElementById("editconpword").innerHTML = "* Please confirm password!"; error = 1;}
	else if (newcontact != concontact){ document.getElementById("editconpword").innerHTML = "* Passwords don't match!"; error = 1;}

	if (error == 0) return true;
	else if (error == 1) return false;
}

function adminEdit()
{
	var count;
	var error = 0;
	var number = "0123456789";
	var alpha = "abcdefghijklmnopqrstuvwxyz ";
	var fname = document.forms["editaccountadmin"]["acfname"].value;
	var lname = document.forms["editaccountadmin"]["aclname"].value;
	var uname = document.forms["editaccountadmin"]["acuname"].value;
	var current = document.forms["editaccountadmin"]["acpword"].value;
	var newcontact = document.forms["editaccountadmin"]["acnewword"].value;
	var concontact = document.forms["editaccountadmin"]["acconword"].value;
	var hiddenpword = document.forms["editaccountadmin"]["hidepword"].value;

	if (!fname){ document.getElementById("editfname").innerHTML = "* Please fill in first name!"; error = 1;}
	else
	{
		count = checkInvalid(fname,alpha);
		if (count != fname.length){ document.getElementById("editfname").innerHTML = "* There's an invalid character!"; error = 1;}
		else{ document.getElementById("editfname").innerHTML = "";}
	}

	if (!lname){ document.getElementById("editlname").innerHTML = "* Please fill in last name!"; error = 1;}
	else
	{
		count = checkInvalid(lname,alpha);
		if (count != lname.length){ document.getElementById("editlname").innerHTML = "* There's an invalid character!"; error = 1;}
		else{ document.getElementById("editlname").innerHTML = "";}
	}

	if (!uname){ document.getElementById("edituname").innerHTML = "* Please fill in username!"; error = 1;}

	if (!current){ document.getElementById("editpword").innerHTML = "* Please fill in password!"; error = 1;}
	else if (current != hiddenpword){ document.getElementById("editpword").innerHTML = "* Password invalid!"; error = 1;}
	else{ document.getElementById("editpword").innerHTML = "";}

	if (!newcontact){ document.getElementById("editnewword").innerHTML = "* Please fill in new password!"; error = 1;}
	else { document.getElementById("editnewword").innerHTML = "";}

	if (!newcontact && !concontact){ document.getElementById("editconpword").innerHTML = ""; error = 1;}
	else if (newcontact && !concontact){ document.getElementById("editconpword").innerHTML = "* Please confirm password!"; error = 1;}
	else if (newcontact != concontact){ document.getElementById("editconpword").innerHTML = "* Passwords don't match!"; error = 1;}

	if (error == 0) return true;
	else if (error == 1) return false;
}
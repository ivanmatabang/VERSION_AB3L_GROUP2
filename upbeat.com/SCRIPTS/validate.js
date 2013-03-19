function validateForm()
{
	var i;
	var j;
	var k;
	var l;
	var fcount;
	var lcount;
	var ccount;
	var error = 0;
	var found = 0;
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
	var unames = document.forms["signupform"]["unamearr"].value;
	var unamearr = unames.split("/");

	fcount = checkInvalid(upfname,alpha);
	lcount = checkInvalid(uplname,alpha);
	ccount = checkInvalid(contact,number);

	for (i = 0; i < unamearr.length; i++) { if (unamearr[i] == upuname){ found = 1;}}

	if (!upfname){ document.getElementById("upfname").innerHTML = "* Please fill in first name!"; error = 1;}
	else if (fcount != upfname.length) { document.getElementById("upfname").innerHTML = "* Invalid character!"; error = 1;}
	else { document.getElementById("upfname").innerHTML = "";}
	
	if (!uplname){ document.getElementById("uplname").innerHTML = "* Please fill in last name!"; error = 1;}
	else if (lcount != uplname.length) { document.getElementById("uplname").innerHTML = "Invalid character!"; error = 1;}
	else { document.getElementById("uplname").innerHTML = "";}

	if (!upuname){ document.getElementById("upuname").innerHTML = "* Please fill in username!"; error = 1;}
	else if (found == 1){ document.getElementById("upuname").innerHTML = "* Username already exists!"; error = 1;}
	else { document.getElementById("upuname").innerHTML = "";}

	if (ccount != 10) { document.getElementById("upcontact").innerHTML = "* Please enter an 10-digit contact number!"; error = 1;}
	else { document.getElementById("upcontact").innerHTML = "";}

	if (!address){ document.getElementById("upaddress").innerHTML = "* Please enter mailing address!"; error = 1;}
	else { document.getElementById("upaddress").innerHTML = "";}

	if (!upemail){ document.getElementById("upemail").innerHTML = "* Please fill in email!"; error = 1;}
	else if (upemail && !reemail){ document.getElementById("upconemail").innerHTML = "* Please confirm email!"; error = 1;}
	else if (upemail != reemail){ document.getElementById("upconemail").innerHTML = "* Email addresses do not match"; error = 1;}
	else { document.getElementById("upemail").innerHTML = ""; document.getElementById("upconemail").innerHTML = "";}
	
	if (!uppword){ document.getElementById("upword").innerHTML = "* Please fill in password!"; error = 1;}
	else if (uppword && !repword){ document.getElementById("upconpword").innerHTML = "* Please confirm password!"; error = 1;}
	else if (uppword != repword){ document.getElementById("upconpword").innerHTML = "* Passwords do not match!"; error = 1;}
	else { document.getElementById("upword").innerHTML = ""; document.getElementById("upconpword").innerHTML = "";}

	if (error == 1){ return false;}
	else { return true;}
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
	var i;
	var j;
	var found = 0;
	var uname = document.forms["loginform"]["uname"].value;
	var pword = document.forms["loginform"]["pword"].value;
	var unames = document.forms["loginform"]["unamearr"].value;
	var pwords = document.forms["loginform"]["pwordarr"].value;
	var unamearr = unames.split("/");
	var pwordarr = pwords.split("/");

	for (i = 0; i < unamearr.length; i++) { if (unamearr[i] == uname){ found = 1; break;}}
	for (j = 0; j < pwordarr.length; j++) { if (pwordarr[j] == pword){ break;}}

	if (uname)
	{
		if (!pword){ $("#loginerror").html("Password unfilled!");}
		else if (found == 1 && i != j){ $("#loginerror").html("Invalid account!");}
		else if (found == 0){ $("#loginerror").html("Invalid account!");}
		else return true;
	}
	else
	{
		if (!uname && !pword){ $("#loginerror").html("Complete all fields!");}
		else if (!uname){ $("#loginerror").html("Username unfilled!");}
		else if (!pword){ $("#loginerror").html("Password unfilled!");}
	}
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

function validAdmin()
{
	var fcount;
	var lcount;
	var error = 0;
	var found = 0;
	var number = "0123456789";
	var alpha = "abcdefghijklmnopqrstuvwxyz ";
	var uname = document.forms["addadministrator"]["adminuname"].value;
	var fname = document.forms["addadministrator"]["adminfname"].value;
	var lname = document.forms["addadministrator"]["adminlname"].value;
	var pword = document.forms["addadministrator"]["adminpword"].value;
	var conpword = document.forms["addadministrator"]["adminconpword"].value;
	var unames = document.forms["addadministrator"]["unamearr"].value;
	var unamearr = unames.split("/");

	fcount = checkInvalid(fname,alpha);
	lcount = checkInvalid(lname,alpha);

	for (i = 0; i < unamearr.length; i++) { if (unamearr[i] == uname){ found = 1;}}

	if (!fname){ document.getElementById("adminfname").innerHTML = "* Please enter first name!"; error = 1;}
	else if (fcount != fname.length){ document.getElementById("adminfname").innerHTML = "First name contains an invalid character!"; error = 1;}
	else{ document.getElementById("adminfname").innerHTML = "";}

	if (!uname){ document.getElementById("adminuname").innerHTML = "* Please enter username!"; error = 1;}
	else if (found == 1){ document.getElementById("adminuname").innerHTML = "* Username already exists!"; error = 1;}
	else{ document.getElementById("adminuname").innerHTML = "";}

	if (!lname){ document.getElementById("adminlname").innerHTML = "* Please enter last name!"; error = 1;}
	else if (lcount != lname.length){ document.getElementById("adminlname").innerHTML = "Last name contains an invalid character!"; error = 1;}
	else{ document.getElementById("adminlname").innerHTML = "";}

	if (!pword){ document.getElementById("adminpword").innerHTML = "* Please enter password!"; error = 1;}
	else if (pword && !conpword){ document.getElementById("adminconpword").innerHTML = "* Please confirm password!"; error = 1;}
	else if (pword != conpword){ document.getElementById("adminconpword").innerHTML = "Passwords don't match!"; error = 1;}
	else{ document.getElementById("adminpword").innerHTML = ""; document.getElementById("adminconpword").innerHTML = "";}
	
	if (error == 0){ return true;}
	else{ return false};
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
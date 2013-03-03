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
	var alpha = "abcdefghijklmnopqrstuvwxyz";
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
	else if (ccount != 11) { document.getElementById("filluperror").innerHTML = "Please enter an 11-digit contact number!";}
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
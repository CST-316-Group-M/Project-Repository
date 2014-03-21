/*
 * This code can be found at: 
 * http://www.w3resource.com/javascript/form/javascript-sample-registration-form-validation.php 
 * some of the code has been modified for our use
 */

function formValidation() {
	var uid = document.registration.userid;
	var passid = document.registration.passid;
	var uname = document.registration.username;
	var uadd = document.registration.address;
	var ucountry = document.registration.country;
	var uzip = document.registration.zip;
	var uemail = document.registration.email;
	var umsex = document.registration.msex;
	var ufsex = document.registration.fsex;
	if (userid_validation(uid, 5, 12)) {
		if (passid_validation(passid, 7, 12)) {
			if (allLetter(uname)) {
				if (alphanumeric(uadd)) {
					if (countryselect(ucountry)) {
						if (allnumeric(uzip)) {
							if (ValidateEmail(uemail)) {
								if (validsex(umsex, ufsex)) {
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

/*
 * Function for Validating the user id
 */
function userid_validation(uid, mx, my) {
	var uid_len = uid.value.length;
	if (uid_len == 0 || uid_len >= my || uid_len < mx) {
		alert("User Id should not be empty / length be between " + mx + " to "
				+ my);
		uid.focus();
		return false;
	}
	return true;
}

/*
 * Function for Validating the user password
 */
function passid_validation(passid, mx, my) {
	var passid_len = passid.value.length;
	if (passid_len == 0 || passid_len >= my || passid_len < mx) {
		alert("Password should not be empty / length be between " + mx + " to "
				+ my);
		passid.focus();
		return false;
	}
	return true;
}

/*
 * Function for Validating the user name
 */
function allLetter(uname) {
	var letters = /^[A-Za-z]+$/;
	if (uname.value.match(letters)) {
		return true;
	} else {
		alert('Username must have alphabet characters only');
		uname.focus();
		return false;
	}
}

/*
 * Function for Validating the address
 */
function alphanumeric(uadd) {
	var letters = /^[0-9a-zA-Z]+$/;
	if (uadd.value.match(letters)) {
		return true;
	} else {
		alert('User address must have alphanumeric characters only');
		uadd.focus();
		return false;
	}
}

/*
 * Function for Validating the country
 */
function countryselect(ucountry) {
	if (ucountry.value == "Default") {
		alert('Select your country from the list');
		ucountry.focus();
		return false;
	} else {
		return true;
	}
}

/*
 * Function for Validating the zip code
 */
function allnumeric(uzip) {
	var numbers = /^[0-9]+$/;
	if (uzip.value.match(numbers)) {
		return true;
	} else {
		alert('ZIP code must have numeric characters only');
		uzip.focus();
		return false;
	}
}

/*
 * Function for Validating the user email
 */
function ValidateEmail(uemail) {
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (uemail.value.match(mailformat)) {
		return true;
	} else {
		alert("You have entered an invalid email address!");
		uemail.focus();
		return false;
	}
}

/*
 * Function for Validating the user's gender
 */
function validsex(umsex, ufsex) {
	x = 0;

	if (umsex.checked) {
		x++;
	}
	if (ufsex.checked) {
		x++;
	}
	if (x == 0) {
		alert('Select Male/Female');
		umsex.focus();
		return false;
	} else {
		alert('Form Successfully Submitted');
		return true;
	}
}
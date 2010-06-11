<?php

/*
 * Contain validation functions.
 */

/*
 * Just as it sounds. This functions receives an email address
 * and returns true if email is in a valid format and true if
 * it's not.
 */
function validateEmail($email)
{
	if (preg_match(
			"/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",
			$email)) 
		return true;
	else
		return false;
}

// Pretty much cut and paste from
// http://www.devshed.com/c/a/PHP/Email-Address-Verification-with-PHP/1/
// Though we here only do an easy form of email format validation.


/*
 * Validate user name format.
 * - Minimum 4 characters
 * - Characters a-z A-Z 0-9 _
 */
function validateUsername($username)
{
	if(preg_match("/^[a-zA-Z0-9_]{4,}$/", $username))
		return true;
	else
		return false;
}

/*
 * Validate the password.
 * This really only includes checking a minimum length of 8 chars.
 * If you want to force stuff like needing to have at least one
 * digit or special char this is the place to do it.
 */
function validatePassword($password)
{
	if(strlen($password) >= 8)
		return true;
	else
		return false;
}
?>

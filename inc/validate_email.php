<?php

/*
 * Just as it sounds. This functions receives an email address
 * and returns true if email is in a valid format and true if
 * it's not.
 */
function validateEmail($email)
{
	if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/" , $email)) 
		return true;
	else
		return false;
}

// Pretty much cut and paste from
// http://www.devshed.com/c/a/PHP/Email-Address-Verification-with-PHP/1/
// Though we here only do an easy form of email format validation.
?>

<?php

/*
 * Generate 10 character salt
 */
function generateSalt()
{
	$possibleValues =
		'0123456789abcdefghijklmnopqrstuvxyzABCDEFGHIJKLMNOPQRSTUVXYZ';
	$salt = '';

	for($i = 0; $i < 10; $i++)
	{
		$salt .= $possibleValues[mt_rand(0, strlen($possibleValues)-1)];	
	}

	return $salt;
}

/*
 * Matches entered password with the hash
 * in the database.
 */
function matchPassword($userPassword, $saltAndHash)
{
	$hashValues = preg_split('/\./', $saltAndHash);
	$salt = $hashValues[0];
	$hash = $hashValues[1];

	if((hash("sha512", $salt.$userPassword)) == $hash)
		return true;
	else
		return false;
}

/*
 * Takes a password then generates a salt
 * and creates a hash. Returns salt+hash.
 */
function generateHash($userPassword)
{
	$salt = generateSalt();
	$result = $salt.".".hash("sha512", $salt.$userPassword);

	return $result;
}

?>

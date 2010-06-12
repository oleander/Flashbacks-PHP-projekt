<?php
/*
 * This is the Error class.
 * The purpose of this class is to easily save errors,
 * send them around, print them and to have a common way
 * to refer to them.
 *
 * To understand this class you should probably understand
 * some about bitwise operations. Google them!
 * (or just go here http://www.litfuel.net/tutorials/bitwise.htm)
 */

class Error
{
	// Errors are saved in an integer and tested by methods
	// in a bitwise manner. So if "No username" has the value 1
	// and "Wrong format email" has the eror value 2 and both
	// those errors occur our $error contains the value 3 (1+2).
	private $errorValue = 0;

	// There are probably better ways to do this.
	// Probably should make a way to load error list in a
	// dynamic way.
	// Also on a 32 bit system we can only have 32 different
	// errors. Bit of a bummer. ;)
	// Right now we keep a multi dimensional array in the form
	// $errors['errorName'][0] - Being the error number
	// $errors['errorName'][1] - Being the error description
	private $errors = array(
		"NO_USERNAME"     => array(1,   "Inget användarnamn matades in."),
		"NO_PASSWORD"     => array(2,   "Lösenord måste matas in två gånger."),
		"NO_EMAIL"        => array(4,   "Ingen e-postadress matades in."),
		"DIFF_PASSWORDS"  => array(8,   "Lösenorden matchade inte."),
		"FORMAT_USERNAME" => array(16,  "Användarnamnet måste ha minst fyra tecken
		  där tillåtna tecken är a-z A-Z 0-9 samt _."),
		"FORMAT_PASSWORD" => array(32,  "Lösenordet måste ha minst åtta tecken."),
		"FORMAT_EMAIL"    => array(64,  "Ogiltig e-postadress."),
		"NO_ALLFIELDS"    => array(128, "Alla fält måste vara ifyllda."),
		"USER_EXIST"      => array(256, "Användarnamnet finns redan."),
		"FAIL_LOGIN"      => array(512, "Felaktigt användarnamn eller lösenord.")
		);
	
	/*
	 * Constructor
	 * Sets object variable $error to 0 unless a value
	 * is passed to the constructor.
	 */
	public function __construct($error = 0)
	{
		$this->errorValue = $error;
	}

	/*
	 * __toString magic method
	 * This is called when object is converted / used as a string.
	 * Like: 
	 *  $error = new Error(222);
	 *  echo $error;
	 */
	public function __toString()
	{
		// We could probably return something more interesting
		// than just the error value. 
		return "Felvärde: ".$this->getValue();
	}

	/*
	 * Returns the current error value
	 */
	public function getValue()
	{
		return $this->errorValue;	
	}

	/*
	 * Adds an error to the list.
	 */
	public function add($errorName)
	{
		// Sets a bit flag using or bitwise operator.
		// Returns true if error was set or false if the error doesn't exist.
		if($this->isValidError($errorName))
		{
			$this->errorValue |= $this->errors[$errorName][0];
			return true;
		}
		else
		{
			return false;
		}
	}

	/*
	 * Returns an array with currently set errors.
	 * Could be used with a foreach loop.
	 */
	public function getErrors()
	{
		$errorList = array();

		// Going through every possible error and check if they're set.
		// If they are we add them to the array.
		foreach($this->errors as $errorRow)
		{
			if($errorRow[0] & $this->errorValue)
				$errorList[] = $errorRow[1];
		}

		return $errorList;
	}

	/*
	 * Returns true if we have ANY error set and false otherwise.
	 */
	public function isError()
	{
		if($this->errorValue != 0)
			return true;
		else
			return false;
	}

	/*
	 * Providing a way to get the possible errors to set.
	 * Returned as an array in the form of:
	 * "KeyName - Description"
	 */
	public function getPossibleErrors()
	{
		$possibleErrors = array();

		foreach($this->errors as $key=>$value)
		{
			 $possibleErrors[] = $key." - ".$value[1];
		}

		return $possibleErrors;
	}

	/*
	 * Checks is a given error is currently set.
	 */
	public function isErrorSet($errorName)
	{
		if($this->isValidError($errorName))
		{
			$errorValue = $this->errors[$errorName][0];
			if($this->errorValue & $errorValue)
				return true;
			else
				return false;
		}
		else
		{
			// Well the error is not even in the list so it cannot have
			// been set.
			return false;
		}
	}

	/*
	 * Clear error flags
	 */
	public function clear()
	{
		$this->errorValue = 0;
	}

	/*
	 * Protected function to check if a given error name
	 * is in the error list.
	 */
	protected function isValidError($errorName)
	{
		if(array_key_exists($errorName, $this->errors))
			return true;
		else
			return false;
	}
}
?>

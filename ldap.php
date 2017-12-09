<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// ldap
function bindAD($user, $pass)
{

	// connect to ldap server
	$ldapconn = ldap_connect("synergy.bcp.org")
		or die("Could not connect to AD server.");

	if ($ldapconn) {

		// attempt bind to AD and echo results
		$return = (ldap_bind($ldapconn, $user, $pass) ?: false);

	}

	return ($return ?: false);

}


//example form intake
if($_SERVER['REQUEST_METHOD'] === 'POST')
{

	//add validation etc here...
	$email = (!empty($_POST['email']) ? $_POST['email'] : null);
	$pass = (!empty($_POST['pass']) ? $_POST['pass'] : null);


	//call bindAD function
	if($email && $pass)
		echo (bindAD($email, $pass) ? "credentials are a GO! now do something cool!" : "user/password incorrect");

	else echo "user/password incorrect";

}

?>


<form method="post">
<input type="email" name="email" placeholder="email">
<input type="password" name="pass" placeholder="pass">
<input type="submit" value="Login">
</form>
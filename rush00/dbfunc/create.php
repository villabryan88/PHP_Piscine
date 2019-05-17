<?php

function elem_is_set($accounts, $login)
{
	$found = 0;
	foreach($accounts as $account)
	{
		if($account["login"] == $login)
			$found = 1;
	}
 	return $found;
}

function check_write_account()
{
	if (!$_POST["passwd"] || !$_POST["login"])
		return 0;

	$new_account = [
    "login" => $_POST["login"],
	"passwd" => hash("whirlpool", $_POST["passwd"]),
	"isadmin" => 0,
	];

	$accounts = unserialize(file_get_contents("privdb/users"));

	if (elem_is_set($accounts, $_POST["login"]))
		return 0;
	else
	{
		$accounts[] = $new_account;
		file_put_contents("privdb/users", serialize($accounts));
		return 1;
	}
}

function signup()
{

	if (check_write_account())
		return TRUE;
	else
		return FALSE;
}
?>

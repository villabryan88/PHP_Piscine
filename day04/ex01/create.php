<?php

function check_make()
{
	$array = array();
	if (!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/passwd"))
		file_put_contents("../private/passwd", serialize($array));
}

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
	];
	
	$accounts = unserialize(file_get_contents("../private/passwd"));

	if (elem_is_set($accounts, $_POST["login"]))
		return 0;
	else
	{
		$accounts[] = $new_account;
		file_put_contents("../private/passwd", serialize($accounts));
		return 1;
	}
}

if ($_POST["submit"] == "OK")
{
	check_make();
	if (check_write_account())
		echo "OK\n";
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>

<?php
$userdb_dir = "../privdb/users";

function check_set()
{
	$accounts = unserialize(file_get_contents($userdb_dir));

	if (!$_POST["login"] || !$_POST["oldpw"] || !$_POST["newpw"])
		return 0;

	foreach($accounts as &$account)
	{
		if($account["login"] == $_POST["login"])
		{
			if($account["passwd"] == hash("whirlpool",$_POST["oldpw"]))
			{
				$account["passwd"] = hash("whirlpool", $_POST["newpw"]);
				file_put_contents($userdb_dir, serialize($accounts));
				return 1;
			}
		}
	}
	return 0;
}

if ($_POST["submit"] == "OK")
{
	check_make_database();
	if (check_set())
	{
		echo "OK\n";
	}
	else
		echo "ERROR\n";

}
else
	echo "ERROR\n";
?>

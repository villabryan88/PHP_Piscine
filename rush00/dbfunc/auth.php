<?php
function auth($login, $passwd)
{
    $userdb_dir = "privdb/users";
    $accounts = unserialize(file_get_contents($userdb_dir));

	foreach($accounts as $account)
	{
        if($account["login"] == $login && $account["passwd"] == hash("whirlpool", $passwd))
            return TRUE;
    }
    return FALSE;
}
?>
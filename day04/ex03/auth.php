<?php

function auth($login, $passwd)
{
    $accounts = unserialize(file_get_contents("../private/passwd"));

	foreach($accounts as $account)
	{
        if($account["login"] == $login && $account["passwd"] == hash("whirlpool", $passwd))
            return TRUE;
    }
    return FALSE;
}
?>
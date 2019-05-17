<?php
session_start();
    $userdb_dir = "../privdb/users";
    $accounts = unserialize(file_get_contents($userdb_dir));
    print_r($accounts);
    $login = $_POST["login"];
    $passwd = $_POST["passwd"];
    echo $_POST["login"]."\n";
    echo $_POST["passwd"]."\n";
	foreach($accounts as $account)
	{
        if($account["login"] == $login && $account["passwd"] == hash("whirlpool", $passwd))
            echo "OK";
    }
    echo "error";

?>
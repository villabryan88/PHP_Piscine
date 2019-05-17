<?php

function delete_user($user)
{
    $accounts = unserialize(file_get_contents("privdb/users"));

    $i = 0;
    $size = count($accounts);

    while ($i < $size)
    {
        if ($accounts[$i]["login"] == $user)
        {
            unset($accounts[$i]);
            break ;
        }
        $i++;
    }
    file_put_contents("privdb/users", serialize($accounts));
}

function make_admin($user)
{
    $accounts = unserialize(file_get_contents("privdb/users"));

    $i = 0;
    $size = count($accounts);

    while ($i < $size)
    {
        if ($accounts[$i]["login"] == $user)
        {
            $accounts[$i]['isadmin'] = 1;
            break ;
        }
        $i++;
    }
    file_put_contents("privdb/users", serialize($accounts)); 
}
?>

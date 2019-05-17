<?php
function check_admin($accounts, $user)
{
    foreach($accounts as $account)
    {
        if($account["login"] == $user)
        {
            if ($account["isadmin"])
                return TRUE;
            else
                return FALSE;
        }
    }
    return FALSE;
}
?>
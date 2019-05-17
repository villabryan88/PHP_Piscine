<?php

include "../check_admin";

function add_prod($accounts, $prod, $desc, $cat)
{
    $content = "tags: ".$cat."\n".$desc;
    if(!isset($_SESSION["logged_on_user"]))
        return "not logged in";
    $user = $_SESSION["logged_on_user"];
    if (!check_admin($accounts, $user))
        return "not an admin";
    if (!$prod || !$desc || !$cat)
        return "Some Fields are Missing";
    if (file_exists("database/".$prod))
        return "product exists already";
    file_put_contents("database/".$prod, $content);
    return "product succesfully created";
}
?>
<?php
session_start();
$found = 0;
foreach($_SESSION as $key => $value)
{
    if ($key == "loggued_on_user")
    {
        if ($value)
        {
            echo $value."\n";
            $found = 1;
        }
    }
}
if (!$found)
    echo "ERROR\n";
?>
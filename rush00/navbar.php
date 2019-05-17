<?php
session_start();
include "dbfunc/login.php";
function make_header($current) {
        $pages = array("index", "store", "cart", "help");
        echo '<div class="navbar">';
        echo "<ul>\n";
        foreach($pages as $page) {
                if ($page === $current)
                        echo '<li class="current"><a href="' . $page . '.php">' . $page . '</a></li>';
                else
                        echo '<li><a href="' . $page . '.php">' . $page . '</a></li>';

        }
        login();
        echo "</ul>\n";
        echo "</div>\n";

}
?>
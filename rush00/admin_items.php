<?php


function put_item($file) {
        echo '<div class="item">';
        echo '<h2>' . preg_replace('/database\//', '', $file) . '</h2>';
        $fp = fopen($file, 'r');
        fgets($fp); /* read tags line */
        while (!feof($fp)) {
                echo fgets($fp);
        }
        echo '</div>';
}

function store_items() {
        $files = glob('database/*');
        foreach($files as $file) {
                $line = fgets(fopen($file, 'r'));
                put_item($file);
        }
}
?>

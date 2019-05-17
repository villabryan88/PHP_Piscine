#!/usr/bin/php
<?php

function arr_upper($matches)
{
	return strtoupper($matches[0]);
}

function title_upper($matches)
{
	$matches[0] = preg_replace_callback("/\"[^\"]*\"/", "arr_upper", $matches[0]);

	return $matches[0];
}

function a_upper($matches)
{
	$matches[0] = preg_replace_callback("/>[^<]*</", "arr_upper", $matches[0]);

	$matches[0] = preg_replace_callback("/title=\"[^\"]*\"/", "title_upper", $matches[0]);

	return $matches[0];
}


if ($argc == 2)
{
	$str = file_get_contents($argv[1]);

	$str = preg_replace_callback("~<[aA].*>.*</[aA]>~sU", "a_upper", $str);
	echo "$str";
}

?>

#!/usr/bin/php
<?php

if ($argc != 4)
	echo "Incorrect Parameters\n";
else
{
	$a = trim($argv[1]);
	$b = trim($argv[2]);
	$c = trim($argv[3]);

	if ($b == "+")
		echo ($a + $c)."\n";
	if ($b == '-')
		echo ($a - $c)."\n";
	if ($b == '*')
		echo ($a * $c)."\n";
	if ($b == '/')
		echo ($a / $c)."\n";
	if ($b == '%')
		echo ($a % $c)."\n";
}
?>

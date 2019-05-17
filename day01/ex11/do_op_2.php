#!/usr/bin/php
<?php

if ($argc != 2)
	echo "Incorrect Parameters\n";
else
{
	if (preg_match("#^\s*(-?\d*)\s*([\*%+/-])\s*(-?\d*)\s*$#", $argv[1], $match))
	{
		$a = $match[1];
		$b = $match[2];
		$c = $match[3];

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
	else
		echo "Syntax Error\n";
}
?>

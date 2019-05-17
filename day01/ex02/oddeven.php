#!/usr/bin/php
<?php

function is_even($val)
{
	return ($val % 2 == 0);
}
echo "Enter a number: ";
while($val = fgets(STDIN))
{
	$val = trim($val);
	if (is_numeric($val))
	{
		echo "The number $val is ";
		if (is_even($val))
			echo "even\n";
		else
			echo "odd\n";
	}
	else
		echo "'$val' is not a number\n";
	echo "Enter a number: ";
}
echo "\n";
?>

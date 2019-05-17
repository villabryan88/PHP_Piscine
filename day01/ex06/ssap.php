#!/usr/bin/php
<?php
$i = 1;
$arr = [];
while ($i < $argc)
{
	$format = preg_replace("/\s+/"," ",trim($argv[$i]));
	if (!empty($format))
		$arr = array_merge($arr, explode(" ", $format));
	$i++;
}
sort($arr);
foreach ($arr as $word)
	echo $word."\n";
?>
